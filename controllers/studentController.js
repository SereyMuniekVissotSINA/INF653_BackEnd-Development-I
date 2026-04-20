const Student = require('../models/Student');

// Get all students
exports.getAllStudents = async (req, res) => {
  try {
    const students = await Student.find();
    res.status(200).json({
      success: true,
      count: students.length,
      data: students,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Error retrieving students',
      error: error.message,
    });
  }
};

// Get one student by ID
exports.getStudentById = async (req, res) => {
  try {
    const student = await Student.findById(req.params.id);

    if (!student) {
      return res.status(404).json({
        success: false,
        message: 'Student not found',
      });
    }

    res.status(200).json({
      success: true,
      data: student,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Error retrieving student',
      error: error.message,
    });
  }
};

// Create a new student
exports.createStudent = async (req, res) => {
  try {
    const { firstName, lastName, email, course, enrolledDate } = req.body;

    // Validate required fields
    if (!firstName || !lastName || !email || !course) {
      return res.status(400).json({
        success: false,
        message: 'Please provide all required fields: firstName, lastName, email, course',
      });
    }

    // Create student
    const student = await Student.create({
      firstName,
      lastName,
      email,
      course,
      enrolledDate: enrolledDate || new Date(),
    });

    res.status(201).json({
      success: true,
      message: 'Student created successfully',
      data: student,
    });
  } catch (error) {
    // Handle duplicate email error
    if (error.code === 11000) {
      return res.status(400).json({
        success: false,
        message: 'Email already exists',
      });
    }

    res.status(500).json({
      success: false,
      message: 'Error creating student',
      error: error.message,
    });
  }
};

// Update an existing student
exports.updateStudent = async (req, res) => {
  try {
    const { id } = req.params;
    const { firstName, lastName, email, course, enrolledDate } = req.body;

    // Check if student exists
    let student = await Student.findById(id);
    if (!student) {
      return res.status(404).json({
        success: false,
        message: 'Student not found',
      });
    }

    // Update fields if provided
    if (firstName) student.firstName = firstName;
    if (lastName) student.lastName = lastName;
    if (email) student.email = email;
    if (course) student.course = course;
    if (enrolledDate) student.enrolledDate = enrolledDate;

    // Save updated student
    student = await student.save();

    res.status(200).json({
      success: true,
      message: 'Student updated successfully',
      data: student,
    });
  } catch (error) {
    // Handle duplicate email error
    if (error.code === 11000) {
      return res.status(400).json({
        success: false,
        message: 'Email already exists',
      });
    }

    res.status(500).json({
      success: false,
      message: 'Error updating student',
      error: error.message,
    });
  }
};

// Delete a student
exports.deleteStudent = async (req, res) => {
  try {
    const { id } = req.params;

    const student = await Student.findByIdAndDelete(id);

    if (!student) {
      return res.status(404).json({
        success: false,
        message: 'Student not found',
      });
    }

    res.status(200).json({
      success: true,
      message: 'Student deleted successfully',
      data: student,
    });
  } catch (error) {
    res.status(500).json({
      success: false,
      message: 'Error deleting student',
      error: error.message,
    });
  }
};
