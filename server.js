const express = require('express');
const connectDB = require('./dbConfig');
require('dotenv').config();

const app = express();

// Middleware
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Enable CORS
app.use((req, res, next) => {
  res.header('Access-Control-Allow-Origin', '*');
  res.header('Access-Control-Allow-Headers', 'Content-Type');
  res.header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
  if (req.method === 'OPTIONS') {
    return res.sendStatus(200);
  }
  next();
});

// Serve static files
app.use(express.static('public'));

// Import routes
const studentRoutes = require('./routes/studentRoutes');

// Routes
app.use('/students', studentRoutes);

// Basic route
app.get('/', (req, res) => {
  res.json({
    message: 'Student Management API',
    version: '1.0.0',
    endpoints: {
      getAllStudents: 'GET /students',
      getStudentById: 'GET /students/:id',
      createStudent: 'POST /students',
      updateStudent: 'PUT /students/:id',
      deleteStudent: 'DELETE /students/:id',
      ui: 'http://localhost:5000',
    },
  });
});

// 404 handler
app.use((req, res) => {
  res.status(404).json({
    success: false,
    message: 'Route not found',
  });
});

// Error handler middleware
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(err.status || 500).json({
    success: false,
    message: err.message || 'Server error',
  });
});

// Start server
const PORT = process.env.PORT || 5000;

const startServer = async () => {
  const dbConnected = await connectDB();

  if (dbConnected) {
    app.listen(PORT, () => {
      console.log(`\n🚀 Server is running on http://localhost:${PORT}`);
      console.log(`📚 Student Management API ready`);
      console.log(`🌐 UI available at http://localhost:${PORT}\n`);
    });
  } else {
    console.log('Failed to connect to MongoDB. Exiting...');
    process.exit(1);
  }
};

startServer();
