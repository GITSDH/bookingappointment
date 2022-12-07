<x-guest-layout>
    <x-slot name="headstyle">
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    </x-slot>
    <x-slot name="navbar"></x-slot>
    <x-form-card>
        <form method="POST" action="{{ route('register') }}">
            @csrf


            <fieldset>
                <div class="my-4 flex items-center gap-6">
                    <div class="flex items-center">
                        <input id="push-everything" name="push-notifications" type="radio"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700">Select by
                            facility</label>
                    </div>
                    <div class="flex items-center">
                        <input id="push-email" name="push-notifications" type="radio"
                            class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700">Search by
                            appointment type</label>
                    </div>
                </div>
            </fieldset>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Facility')" />

                <x-text-input id="name" class="block mt-1 w-full rounded-full" type="text" name="name"
                    :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Appointment Type -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Appointment Type')" />

                <x-text-input id="email" class="block mt-1 w-full rounded-full" type="email" name="email"
                    :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Physician -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Physician')" />

                <x-text-input id="password" class="block mt-1 w-full rounded-full" type="password" name="password"
                    required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Preferred Date -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Preferred Date')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-full" type="password"
                    name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4 rounded-full">
                    {{ __('Service Description') }}
                </x-primary-button>
                <x-primary-button class="ml-4 rounded-full">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </x-form-card>
    <div class="bg-gray-100 pb-6">
        <div class="container mx-auto">
            <table id="appoinmenttable" class="display bg-violet-50" style="width:100%">
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

    <x-slot name="script">
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready( function () {
                $('#appoinmenttable').DataTable({
                    paging: false,
                    ordering: false,
                    info: false,
                    searching: false,
                });
            } );
        </script>
    </x-slot>
</x-guest-layout>
