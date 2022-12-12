$(document).ready(function () {
    $('#selectfacility').attr('checked', true);
    let search = $('input[name="searchby"]');
    search.change(function (e) {
        e.preventDefault();
        if ($('#selectappoinment').is(':checked')) {
            $('.appo1').removeClass('hidden');
            $('.appo2').addClass('hidden');
            $("#facility").html('<option value="">Select Appoinment type First</option>');
            $("#doctor").html('<option value="">Select Facility First</option>');
        }
        if ($('#selectfacility').is(':checked')) {
            $('.appo2').removeClass('hidden');
            $('.appo1').addClass('hidden');
            getHospitals();

        }
    });

    // Data table
    $('#appoinmenttable').DataTable({
        paging: false,
        ordering: false,
        info: false,
        searching: false,
    });


    if ($('#selectfacility').is(':checked')) {
        getHospitals();
    }

    $('#facility').change(function (e) {
        e.preventDefault();
        var hospital = $("#facility").val();
        // getDoctors(hospital);
        getSpeciality()
    });


    function getHospitals() {
        $.ajax({
            type: 'GET',
            url: BASE_URL + 'common/getfacility',
            success: function (response) {
                var hospitalhtml = '<option value="">Select One From Below</option>';
                if (response.status == "success") {
                    var hospitals = response.data;
                    $.each(hospitals, function (key, value) {
                        hospitalhtml += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $("#facility").html(hospitalhtml);
                }
            }
        });
    }

    // getdoctor by fascility
    function getDoctors(hospital) {
        $.ajax({
            type: 'GET',
            url: BASE_URL + 'common/getDoctor',
            data: {
                hospital:hospital
            },
            success: function (response) {
                var doctorhtml = '<option value="">Select One From Below</option>';
                if (response.status == "success") {
                    var doctors = response.data;
                    $.each(doctors, function (key, value) {
                        doctorhtml += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $("#doctor").html(doctorhtml);
                }
            }
        });
    }








});
