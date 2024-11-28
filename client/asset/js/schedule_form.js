document.getElementById('next-to-step-2').addEventListener('on_click', function () {
    const date = document.getElementById('appointment_date').value;
    const specialty = document.getElementById('specialty').value;

    if (!date || !specialty) {
        alert('Por favor, selecciona una fecha y una especialidad.');
        return;
    }

    // Fetch para obtener los doctores
    fetch(`../../../server/controllers/get_doctors.php?specialty=${specialty}`)
        .then(response => response.json())
        .then(data => {
            const doctorSelect = document.getElementById('doctor');
            doctorSelect.innerHTML = '<option value="" disabled selected>Selecciona un doctor</option>';
            data.forEach(doctor => {
                doctorSelect.innerHTML += `<option value="${doctor.id}">${doctor.first_name} ${doctor.last_name}</option>`;
            });

            // Avanzar al paso 2
            document.getElementById('step-1').style.display = 'none';
            document.getElementById('step-2').style.display = 'block';
        })
        .catch(error => alert('Error al cargar los doctores.'));
});

document.getElementById('next-to-step-3').addEventListener('click', function () {
    const doctorId = document.getElementById('doctor').value;
    const date = document.getElementById('appointment_date').value;

    if (!doctorId) {
        alert('Por favor, selecciona un doctor.');
        return;
    }

    // Fetch para obtener los horarios disponibles
    fetch(`../../../server/controllers/get_available_times.php?doctor_id=${doctorId}&date=${date}`)
        .then(response => response.json())
        .then(data => {
            const timeSelect = document.getElementById('time');
            timeSelect.innerHTML = '<option value="" disabled selected>Selecciona un horario</option>';
            data.forEach(time => {
                timeSelect.innerHTML += `<option value="${time}">${time}</option>`;
            });

            // Avanzar al paso 3
            document.getElementById('step-2').style.display = 'none';
            document.getElementById('step-3').style.display = 'block';
        })
        .catch(error => alert('Error al cargar los horarios.'));
});
