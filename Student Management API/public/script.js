const API_URL = 'http://localhost:5000/students';

// DOM Elements
const studentForm = document.getElementById('studentForm');
const firstNameInput = document.getElementById('firstName');
const lastNameInput = document.getElementById('lastName');
const emailInput = document.getElementById('email');
const courseInput = document.getElementById('course');
const enrolledDateInput = document.getElementById('enrolledDate');
const studentIdInput = document.getElementById('studentId');
const cancelBtn = document.getElementById('cancelBtn');
const searchInput = document.getElementById('searchInput');
const studentsContainer = document.getElementById('studentsContainer');
const emptyState = document.getElementById('emptyState');
const loadingSpinner = document.getElementById('loadingSpinner');
const alertContainer = document.getElementById('alertContainer');

let allStudents = [];
let isEditing = false;

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  loadStudents();
  studentForm.addEventListener('submit', handleFormSubmit);
  cancelBtn.addEventListener('click', resetForm);
  searchInput.addEventListener('input', handleSearch);
});

// Fetch all students
async function loadStudents() {
  try {
    showLoading(true);
    const response = await fetch(API_URL);
    
    if (!response.ok) {
      throw new Error('Failed to load students');
    }

    const data = await response.json();
    allStudents = data.data || [];
    renderStudents(allStudents);
  } catch (error) {
    showAlert('Error loading students: ' + error.message, 'error');
  } finally {
    showLoading(false);
  }
}

// Render students
function renderStudents(students) {
  studentsContainer.innerHTML = '';

  if (students.length === 0) {
    studentsContainer.style.display = 'none';
    emptyState.style.display = 'block';
    return;
  }

  emptyState.style.display = 'none';
  studentsContainer.style.display = 'flex';

  students.forEach((student) => {
    const studentCard = document.createElement('div');
    studentCard.className = 'student-card';
    studentCard.innerHTML = `
      <div class="student-header">
        <div class="student-name">${escapeHtml(student.firstName)} ${escapeHtml(student.lastName)}</div>
      </div>
      <div class="student-info">
        <div class="info-item">
          <span class="info-label">Email</span>
          <span class="info-value">${escapeHtml(student.email)}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Course</span>
          <span class="info-value">${escapeHtml(student.course)}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Enrolled Date</span>
          <span class="info-value">${new Date(student.enrolledDate).toLocaleDateString()}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Student ID</span>
          <span class="info-value" style="font-size: 0.85em; font-family: monospace;">${student._id}</span>
        </div>
      </div>
      <div class="student-actions">
        <button class="btn-action btn-edit" onclick="editStudent('${student._id}')">✏️ Edit</button>
        <button class="btn-action btn-delete" onclick="deleteStudent('${student._id}')">🗑️ Delete</button>
      </div>
    `;
    studentsContainer.appendChild(studentCard);
  });
}

// Handle form submission
async function handleFormSubmit(e) {
  e.preventDefault();

  const studentData = {
    firstName: firstNameInput.value.trim(),
    lastName: lastNameInput.value.trim(),
    email: emailInput.value.trim(),
    course: courseInput.value.trim(),
    enrolledDate: enrolledDateInput.value || new Date().toISOString(),
  };

  // Validate
  if (!studentData.firstName || !studentData.lastName || !studentData.email || !studentData.course) {
    showAlert('Please fill in all required fields', 'error');
    return;
  }

  try {
    let response;
    if (isEditing) {
      const id = studentIdInput.value;
      response = await fetch(`${API_URL}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          _id: id,
          ...studentData,
        }),
      });

      if (!response.ok) throw new Error('Failed to update student');
      showAlert('✓ Student updated successfully!', 'success');
    } else {
      response = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(studentData),
      });

      if (!response.ok) {
        const error = await response.json();
        throw new Error(error.message || 'Failed to create student');
      }
      showAlert('✓ Student created successfully!', 'success');
    }

    resetForm();
    loadStudents();
  } catch (error) {
    showAlert('Error: ' + error.message, 'error');
  }
}

// Edit student
async function editStudent(id) {
  try {
    const response = await fetch(`${API_URL}/${id}`);
    if (!response.ok) throw new Error('Failed to fetch student');

    const data = await response.json();
    const student = data.data;

    firstNameInput.value = student.firstName;
    lastNameInput.value = student.lastName;
    emailInput.value = student.email;
    courseInput.value = student.course;
    enrolledDateInput.value = new Date(student.enrolledDate).toISOString().split('T')[0];
    studentIdInput.value = student._id;

    isEditing = true;
    cancelBtn.style.display = 'block';
    document.querySelector('.btn-primary').textContent = 'Update Student';

    // Scroll to form
    document.querySelector('.form-section').scrollIntoView({ behavior: 'smooth' });
  } catch (error) {
    showAlert('Error loading student: ' + error.message, 'error');
  }
}

// Delete student
async function deleteStudent(id) {
  if (!confirm('Are you sure you want to delete this student?')) return;

  try {
    const response = await fetch(`${API_URL}`, {
      method: 'DELETE',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ _id: id }),
    });

    if (!response.ok) throw new Error('Failed to delete student');

    showAlert('✓ Student deleted successfully!', 'success');
    loadStudents();
  } catch (error) {
    showAlert('Error: ' + error.message, 'error');
  }
}

// Reset form
function resetForm() {
  studentForm.reset();
  studentIdInput.value = '';
  isEditing = false;
  cancelBtn.style.display = 'none';
  document.querySelector('.btn-primary').textContent = 'Submit';
}

// Search students
function handleSearch(e) {
  const query = e.target.value.toLowerCase();

  const filtered = allStudents.filter((student) => {
    return (
      student.firstName.toLowerCase().includes(query) ||
      student.lastName.toLowerCase().includes(query) ||
      student.email.toLowerCase().includes(query)
    );
  });

  renderStudents(filtered);
}

// Show/hide loading spinner
function showLoading(show) {
  loadingSpinner.style.display = show ? 'flex' : 'none';
}

// Show alert message
function showAlert(message, type = 'info') {
  const alert = document.createElement('div');
  alert.className = `alert alert-${type}`;
  alert.innerHTML = `
    <span class="alert-close" onclick="this.parentElement.remove();">&times;</span>
    ${message}
  `;
  alertContainer.appendChild(alert);

  setTimeout(() => {
    if (alert.parentElement) {
      alert.remove();
    }
  }, 4000);
}

// Escape HTML to prevent XSS
function escapeHtml(text) {
  const map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;',
  };
  return text.replace(/[&<>"']/g, (m) => map[m]);
}
