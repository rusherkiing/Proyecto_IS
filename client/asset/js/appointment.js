$(document).ready(function () {
    // Validar fecha y cargar especialidades
    $("#date").on("change", function () {
        const fecha = $(this).val();
        if (!fecha) return;

        $.post("../controllers/verificar_fecha.php", { fecha }, function (response) {
            if (response.success) {
                const specialties = $("#specialty").empty().append('<option value="" selected disabled>Selecciona una especialidad</option>');
                response.especialidades.forEach(especialidad => {
                    specialties.append(`<option value="${especialidad}">${especialidad}</option>`);
                });
                specialties.prop("disabled", false);
            } else {
                alert(response.message);
                $("#specialty, #doctor, #time").prop("disabled", true).empty();
            }
        }, "json");
    });

    // Manejar especialidad y cargar doctores
    $("#specialty").on("change", function () {
        const specialty = $(this).val();
        if (!specialty) return;

        $.post("../controllers/get_doctors.php", { specialty }, function (response) {
            const doctors = $("#doctor").empty().append('<option value="" selected disabled>Selecciona un doctor</option>');
            response.doctors.forEach(doctor => {
                doctors.append(`<option value="${doctor.id}">${doctor.name}</option>`);
            });
            doctors.prop("disabled", false);
        }, "json");
    });

    // Manejar doctor y cargar horas
    $("#doctor").on("change", function () {
        const doctor_id = $(this).val();
        const date = $("#date").val();
        if (!doctor_id || !date) return;

        $.post("../controllers/get_available_dates.php", { doctor_id, fecha: date }, function (response) {
            const times = $("#time").empty().append('<option value="" selected disabled>Selecciona una hora</option>');
            response.horas.forEach(hora => {
                times.append(`<option value="${hora}">${hora}</option>`);
            });
            times.prop("disabled", false);
        }, "json");
    });
});
