# Error Handler Middleware Assignment

This is a complete Express application demonstrating custom error handler middleware.

## Project Structure

```
Assignment 4/
├── middleware/
│   ├── logger.js           # Request logging middleware
│   └── errorHandler.js     # Error handling middleware
├── logs/
│   ├── requests.txt        # Request log file (created at runtime)
│   └── errorLog.txt        # Error log file (created at runtime)
├── views/                  # Folder for view files
├── server.js               # Main application file
├── package.json            # Project dependencies
└── README.md               # This file
```

## Setup Instructions

### Step 1: Install Dependencies
```bash
npm install
```

This will install Express and other dependencies listed in package.json.

### Step 2: Run the Server
```bash
npm start
```

Or:
```bash
node server.js
```

You should see:
```
Server running on http://localhost:3000
```

## Testing the Error Handler

### Test Routes Available:

1. **Home Route** - `http://localhost:3000/`
   - Shows available routes
   - Status: ✅ Works (no error)

2. **Working Route** - `http://localhost:3000/working`
   - Returns a success message
   - Status: ✅ Works (no error)

3. **Intentional Error** - `http://localhost:3000/error`
   - Manually throws an error using `next(err)`
   - Status: ⚠️ Triggers error handler
   - Check `logs/errorLog.txt` for logged error

4. **Property Access Error** - `http://localhost:3000/test-error`
   - Attempts to access property of undefined
   - Status: ⚠️ Triggers error handler
   - Check `logs/errorLog.txt` for logged error

5. **Calculation Error** - `http://localhost:3000/calculation-error`
   - Throws a custom error
   - Status: ⚠️ Triggers error handler
   - Check `logs/errorLog.txt` for logged error

## Key Points About This Implementation

### 1. Logger Middleware (`middleware/logger.js`)
- Logs all incoming requests with timestamp
- Writes to `logs/requests.txt`
- Logs happen before routes are processed

### 2. Error Handler Middleware (`middleware/errorHandler.js`)
- **Must have 4 parameters**: `(err, req, res, next)`
- **Must be placed LAST** in the middleware stack (after all routes)
- Catches all errors thrown in routes
- Logs error details:
  - Error name
  - Error message
  - Timestamp
  - Stack trace
- Returns JSON response with status 500 to client
- Prevents server from crashing

### 3. Server Setup in `server.js`
```javascript
// 1. Set up middleware (logger first)
app.use(logger);

// 2. Define all routes
app.get('/route', (req, res) => { ... });

// 3. ERROR HANDLER LAST (This is crucial!)
app.use(errorHandler);
```

**Important**: The error handler MUST be the last middleware registered!

## How Errors Are Logged

When an error occurs, the `errorLog.txt` file will contain entries like:

```
=====================================
Date and Time: 4/13/2026, 2:30:45 PM
Error Name: TypeError
Error Message: Cannot read property 'someProperty' of undefined
Stack Trace:
TypeError: Cannot read property 'someProperty' of undefined
    at /path/to/server.js:45:20
    at Layer.handle [as handle_request] (/path/to/node_modules/express/lib/router/layer.js:95:13)
    ...
=====================================
```

## What This Demonstrates

✅ Creating custom middleware functions
✅ Using the 4-parameter error handling middleware pattern
✅ Logging errors to files
✅ Proper error handler placement
✅ Catching synchronous and asynchronous errors
✅ Sending appropriate HTTP status codes (500)
✅ Preventing server crashes when errors occur
✅ Using `next()` to pass control to next middleware

## Troubleshooting

**Server doesn't start?**
- Make sure all dependencies are installed: `npm install`
- Check that port 3000 is not already in use

**Logs aren't being created?**
- The `logs/` folder will be created automatically when first error occurs
- Check file permissions on your system

**Error page shows raw response?**
- This is normal - the app returns JSON responses
- Check the Network tab in browser DevTools or use Postman/curl to see response

## Next Steps

You can extend this by:
- Creating different error types (ValidationError, DatabaseError, etc.)
- Adding different log levels (info, warn, error)
- Using a logging library like Winston
- Creating a view file for error pages instead of JSON responses
