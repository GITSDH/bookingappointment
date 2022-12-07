<x-guest-layout>
    <x-slot name="headstyle">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    </x-slot>
    <x-slot name="navbar"></x-slot>
    <div class="bg-gray-100 py-6">
        <div class="container mx-auto">
            <div class="mb-10">
                <h2 class=" font-bold mb-4">Upcoming Appointments</h2>
                <table id="upcomint" class="display bg-violet-50" style="width:100%">
                    <thead class="bg-violet-500 text-white uppercase text-base font-light">
                        <tr>
                            <th>Available Date</th>
                            <th>Available Time</th>
                            <th>Appointment Type</th>
                            <th>Facility</th>
                            <th>Physician</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011-07-25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009-01-12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012-03-29</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008-11-28</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012-12-02</td>
                            <td>$372,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="">
                <h2 class="font-bold mb-4">Past Appointments</h2>
                <table id="past" class="display bg-violet-50 mt-6" style="width:100%">
                    <thead class="bg-violet-500 text-white uppercase text-base font-light">
                        <tr>
                            <th>Available Date</th>
                            <th>Available Time</th>
                            <th>Appointment Type</th>
                            <th>Facility</th>
                            <th>Physician</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011-07-25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009-01-12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012-03-29</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008-11-28</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012-12-02</td>
                            <td>$372,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#upcomint, #past').DataTable({
                    paging: false,
                    ordering: false,
                    info: false,
                    searching: false,
                });
            } );
        </script>
    </x-slot>
</x-guest-layout>
