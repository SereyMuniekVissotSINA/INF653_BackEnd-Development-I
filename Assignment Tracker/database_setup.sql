-- Create courses table
CREATE TABLE IF NOT EXISTS courses (
    courseID INT AUTO_INCREMENT PRIMARY KEY,
    courseName VARCHAR(100) NOT NULL
);

-- Create assignments table
CREATE TABLE IF NOT EXISTS assignments (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    courseID INT NOT NULL,
    Description TEXT NOT NULL,
    FOREIGN KEY (courseID) REFERENCES courses(courseID) ON DELETE CASCADE
);
