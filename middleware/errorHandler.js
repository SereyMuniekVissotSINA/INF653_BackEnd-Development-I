//Npm packages 
const {format} = require('date-fns');
const {v4: uuidv4} = require('uuid');

//core modules 
const fs = require('fs');
const path = require('path');

//logEvents function for error logging
const logEvents = async(message, filename) =>{
    const logId = uuidv4();
    const timestamp = format(new Date(), 'yyyy-MM-dd HH:mm:ss');
    const logEntry = `${logId} \t [${timestamp}] \t ${message}\n`;

    try{
        if(!fs.existsSync(path.join(__dirname, '..','logs'))){
            fs.mkdirSync(path.join(__dirname,'..', 'logs'));
        }
        await fs.promises.appendFile(
            path.join(__dirname,'..', 'logs', filename), 
            logEntry
        );
    } catch(err){
        console.error('Error writing to error log file: ', err);
    }
}

//Error handler middleware - must have all 4 parameters (err, req, res, next)
const errorHandler = (err, req, res, next) => {
    const logId = uuidv4();
    const timestamp = format(new Date(), 'yyyy-MM-dd HH:mm:ss');
    const errorName = err.name || 'Unknown Error';
    const errorMessage = err.message || 'No message provided';
    const errorStack = err.stack || 'No stack trace available';

    // Create detailed error log entry
    const errorDetails = `
=====================================
Error ID: ${logId}
Date and Time: ${timestamp}
Error Name: ${errorName}
Error Message: ${errorMessage}
URL: ${req.originalUrl}
Method: ${req.method}
IP: ${req.ip}
Stack Trace:
${errorStack}
=====================================
`;

    // Log the error to file
    logEvents(errorDetails, 'errorLog.txt');

    // Log to console as well
    console.error(`\n[ERROR] ${errorName}: ${errorMessage}`);

    // Send response to client with proper status code
    res.status(err.statusCode || 500).json({
        success: false,
        logId: logId,
        message: 'An error occurred on the server',
        error: process.env.NODE_ENV === 'development' ? errorMessage : 'Internal Server Error'
    });
};

module.exports = {errorHandler, logEvents};