<div class="container">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="d-flex alig-items-center justify-content-between pb-5 pt-3">
        <h3 class="font-weight-bold">Patients</h3>

        <button class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
            data-target="#upsert-patient-modal">Add
            Patient</button>
    </div>

    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Type f Service</th>
                    <th scope="col">General Comments</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($patients as $patient)
                <tr>
                    <th>{{ $patient->name }}</th>
                    <td>{{ $patient->date_of_birth->format('d/m/Y') }}</td>
                    <td>{{ $patient->gender->name }}</td>
                    <td>{{ $patient->service->name }}</td>
                    <td>{{ $patient->comments }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade show" id="upsert-patient-modal" tabindex="-1" aria-labelledby="upsert-patient-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('patients.create') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="upsert-patient-modalLabel">Add Patient</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameHelp"
                                name="name">
                            <small id="nameHelp" class="form-text text-muted">Name of the patient</small>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" class="form-control" id="dob" name="date_of_birth">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender_id" class="custom-select">
                                <option value="" selected>Select Gender...</option>
                                @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="service">Service</label>
                            <select id="service" class="custom-select" name="service_id">
                                <option value="" selected>Select Service...</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}" selected>{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="comments">General Comments</label>
                            <textarea class="form-control" name="comments" id="comments" rows="3">

                        </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>