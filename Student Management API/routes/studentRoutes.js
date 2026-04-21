const express = require('express');
const router = express.Router();
const {
  getAllStudents,
  getStudentById,
  createStudent,
  updateStudent,
  deleteStudent,
} = require('../controllers/studentController');

// Get all students
router.get('/', getAllStudents);

// Get one student by ID
router.get('/:id', getStudentById);

// Create a new student
router.post('/', createStudent);

// Update a student
router.put('/', updateStudent);

// Delete a student
router.delete('/', deleteStudent);

module.exports = router;
