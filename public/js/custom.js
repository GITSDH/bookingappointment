$(document).ready(function () {
    $('#sidemenutoggle').click(function (e) {
        e.preventDefault();
        $('#sidebar').toggleClass('w-52','w-64');
        $('#toggleIcon').toggleClass('rotate-180');
        $('#siteLogo').toggleClass('hidden', 'flex');
        $('.sidelinktext').toggleClass('hidden');
        $('.sidenav a').toggleClass('justify-start','justify-center');
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
