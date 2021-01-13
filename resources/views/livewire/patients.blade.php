<div class="container">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="d-flex alig-items-center justify-content-between pb-5 pt-3">
        <h3 class="font-weight-bold">Patients</h3>

        <button class="btn btn-primary" class="btn btn-primary" data-toggle="modal"
            data-target="#upsert-patient-modal">Add Patient</button>
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
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->date_of_birth->format('d/m/Y') }}</td>
                    <td>{{ $patient->gender->name }}</td>
                    <td>{{ $patient->service->name }}</td>
                    <td>{{ $patient->comments }}</td>
                    <td class="d-flex justify-content-around">
                        <button class="btn btn-sm btn-primary" type="button"
                            wire:click="showUpsertModal({{ $patient }})">
                            <i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="upsert-patient-modal" tabindex="-1"
        aria-labelledby="upsert-patient-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="upsert-patient-modalLabel">
                            {{ is_null($patientId) ? 'Add Patient' : 'Edit Patient' }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    wire:model.lazy="name">
                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    id="dob" wire:model.lazy="date_of_birth">
                                @error('date_of_birth')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="gender">Gender</label>
                                <select id="gender" wire:model.lazy="gender_id"
                                    class="custom-select @error('gender_id') is-invalid @enderror">
                                    <option value="" selected>Select Gender...</option>
                                    @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                                @error('gender_id')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="service">Service</label>
                                <select id="service" class="custom-select @error('service_id') is-invalid @enderror"
                                    wire:model.lazy="service_id">
                                    <option value="" selected>Select Service...</option>
                                    @foreach ($services as $service)
                                    <option value="{{ $service->id }}" selected>{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="comments">General Comments</label>
                            <textarea class="form-control @error('comments') is-invalid @enderror"
                                wire:model.lazy="comments" id="comments" rows="3"></textarea>

                            @error('comments')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        @if (is_null($patientId))
                        <button wire:click.prevent="savePatient" class="btn btn-primary">Submit</button>
                        @else
                        <button wire:click.prevent="updatePatient" class="btn btn-primary">Update</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>