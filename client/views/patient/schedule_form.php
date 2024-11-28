<script src="../../asset/js/schedule_form.js"></script>
<div class="container mt-5">
    <div class="card mt-3">
        <div id="scheduleFormContainer" class="card-body">
            <h3 class="mb-4 text-center">Agendar Cita Médica</h3>
            <!-- Paso 1: Fecha y Especialidad -->
            <div id="step-1">
                <h4>Selecciona Fecha y Especialidad</h4>
                <form id="step-1-form">
                    <div class="mb-3">
                        <label for="appointment_date"><strong>Seleccionar Fecha:</strong></label>
                        <input type="date" id="appointment_date" name="appointment_date" class="form-control"
                            min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+3 days')); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="specialty" class="form-label"><strong>Especialidad:</strong></label>
                        <select id="specialty" name="specialty" class="form-control" required>
                            <option value="" selected disabled>Selecciona una especialidad</option>
                            <option value="Oftalmología">Oftalmología</option>
                            <option value="Cardiología">Cardiología</option>
                            <option value="Pediatría">Pediatría</option>
                            <option value="Ginecología">Ginecología</option>
                            <option value="Dermatología">Dermatología</option>
                            <option value="Medicina General">Medicina General</option>
                        </select>
                    </div>
                    <button type="button" id="next-to-step-2" class="btn btn-primary">Siguiente</button>
                </form>
            </div>

            <!-- Paso 2: Seleccionar Doctor -->
            <div id="step-2" style="display: none;">
                <h4>Paso 2: Selecciona Doctor</h4>
                <form id="step-2-form">
                    <div class="mb-3">
                        <label for="doctor" class="form-label"><strong>Doctor:</strong></label>
                        <select id="doctor" name="doctor" class="form-control" required>
                            <option value="" selected disabled>Selecciona un doctor</option>
                        </select>
                    </div>
                    <button type="button" id="next-to-step-3" class="btn btn-primary">Siguiente</button>
                </form>
            </div>

            <!-- Paso 3: Seleccionar Horario -->
            <div id="step-3" style="display: none;">
                <h4>Paso 3: Selecciona Horario</h4>
                <form id="step-3-form" method="POST" action="../../../server/controllers/schedule_appointment.php">
                    <div class="mb-3">
                        <label for="time" class="form-label"><strong>Hora:</strong></label>
                        <select id="time" name="time" class="form-control" required>
                            <option value="" selected disabled>Selecciona un horario</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Agendar cita</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../asset/js/schedule_form.js"></script>
<script src="js/schedule_form.js"></script>
