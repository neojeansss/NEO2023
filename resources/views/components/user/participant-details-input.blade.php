{{-- THIS COMPONENT REQUIRES A PARENT WITH ALPINE DATA --}}

<div class="container py-3">
    <div class="row">
        <div class="mb-3 col-lg-8 col-12">
            <label class="form-label fw-semibold" for="{{ $prefix }}-full-name">Full Name</label>
            <input id="{{ $prefix }}-full-name" name="participant_name[{{ $prefix }}]" type="text" class="form-control" placeholder="Full Name" required>
        </div>
        <div class="mb-3 col-lg-4 col-12">
            <label class="form-label fw-semibold">Gender</label>
            <fieldset class="col-12 d-flex justify-content-lg-between justify-content-start gap-lg-0 gap-3">
                <input type="radio" class="btn-check" id="male{{ $prefix }}" name="participant_gender[{{ $prefix }}]" value="Male" required>
                <label for="male{{ $prefix }}" class="btn btn-selection d-flex align-items-center" id="male{{ $prefix }}">
                    <i class="bi bi-gender-male"></i>
                </label>

                <input type="radio" class="btn-check" id="female{{ $prefix }}" name="participant_gender[{{ $prefix }}]" value="Female">
                <label for="female{{ $prefix }}" class="btn btn-selection d-flex align-items-center" id="female{{ $prefix }}">
                    <i class="bi bi-gender-female"></i>
                </label>

                <input type="radio" class="btn-check" id="unknown{{ $prefix }}" name="participant_gender[{{ $prefix }}]" value="Unknown">
                <label for="unknown{{ $prefix }}" class="btn btn-selection d-flex align-items-center" id="unknown{{ $prefix }}">
                    <i class="bi bi-question-lg"></i>
                </label>
            </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-12 mb-3">
            <label class="form-label fw-semibold" for="{{ $prefix }}-email">Email</label>
            <input id="{{ $prefix }}-email" name="participant_email[{{ $prefix }}]" type="email" class="form-control" placeholder="Email Address" required @input.debounce="setEmailAddress('{{$prefix}}', $el.value)">
            <template x-if="emailAddressIsTaken('{{$prefix}}')">
                <small class="text-danger">Sorry. It seems like another participant has registered with this email address already.</small>
            </template>
            <template x-if="!emailAddressIsTaken('{{$prefix}}') && emailAddressIsDuplicate('{{$prefix}}')">
            <small class="text-danger">Please ensure that participants have unique email addresses.</small>
            </template>
            <template x-if="!emailAddressIsTaken('{{$prefix}}') && !emailAddressIsDuplicate('{{$prefix}}')">
                <small class="text-muted">Please enter an active email address that can be used to reach the participant.</small>
            </template>
        </div>
        <div class="col-lg-6 col-12 mb-3">
            <label class="form-label fw-semibold" for="{{ $prefix }}-phone">WhatsApp Number</label>
            <input id="{{ $prefix }}-phone" name="participant_phone[{{ $prefix }}]" type="text" class="form-control" placeholder="WhatsApp Number" required>
            <small class="text-muted">Please enter an active Whatsapp number that can be used to reach the participant.</small>
        </div>
    </div>
</div>

<div class="container py-3">
    <div class="row">
        <div class="col-12 mb-3">
            <h5 class="fw-semibold"><i class="bi bi-geo-alt-fill"></i> Address Details</h5>
            <small class="text-muted">Fill in the address data completely and correctly.</small>
        </div>
    </div>

    <div class="row">
        <div class="dropdown col-lg-6 col-12 mb-3">
            <label for="{{ $prefix }}-province" class="form-label fw-semibold">Province</label>
            <select class="form-select" name="address_provinceID[{{ $prefix }}]" id="{{ $prefix }}-province" required>
                <option value="" disabled selected>Select Province</option>
                {{-- @foreach ($provinces as $province)
                <option value="{{ $province->name }}">{{ $province->name }}</option>
                @endforeach --}}
                <option value="1">Aceh</option>
                <option value="2">Sumatra Utara</option>
                <option value="3">Sumatra Barat</option>
                <option value="4">Riau</option>
                <option value="5">Kepulauan Riau</option>
                <option value="6">Jambi</option>
                <option value="7">Bengkulu</option>
                <option value="8">Sumatra Selatan</option>
                <option value="9">Kepulauan Bangka Belitung</option>
                <option value="10">Lampung</option>
                <option value="11">Banten</option>
                <option value="12">Jawa Barat</option>
                <option value="13">DKI Jakarta</option>
                <option value="14">Jawa Tengah</option>
                <option value="15">Jawa Timur</option>
                <option value="16">DI Yogyakarta</option>
                <option value="17">Bali</option>
                <option value="18">Nusa Tenggara Barat</option>
                <option value="19">Nusa Tenggara Timur</option>
                <option value="20">Kalimantan Barat</option>
                <option value="21">Kalimantan Selatan</option>
                <option value="22">Kalimantan Tengah</option>
                <option value="23">Kalimantan Timur</option>
                <option value="24">Kalimantan Utara</option>
                <option value="25">Gorontalo</option>
                <option value="26">Sulawesi Selatan</option>
                <option value="27">Sulawesi Tenggara</option>
                <option value="28">Sulawesi Tengah</option>
                <option value="29">Sulawesi Utara</option>
                <option value="30">Sulawesi Barat</option>
                <option value="31">Maluku</option>
                <option value="32">Maluku Utara</option>
                <option value="33">Papua</option>
                <option value="34">Papua Barat</option>
                <option value="35">Papua Tengah</option>
                <option value="36">Papua Pegunungan</option>
                <option value="37">Papua Selatan</option>

                {{-- <option value="Aceh">Aceh</option>
                <option value="Sumatra Utara">Sumatra Utara</option>
                <option value="Sumatra Barat">Sumatra Barat</option>
                <option value="Riau">Riau</option>
                <option value="Kepulauan Riau">Kepulauan Riau</option>
                <option value="Jambi">Jambi</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="Sumatra Selatan">Sumatra Selatan</option>
                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                <option value="Lampung">Lampung</option>
                <option value="Banten">Banten</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="DI Yogyakarta">DI Yogyakarta</option>
                <option value="Bali">Bali</option>
                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                <option value="Kalimantan Barat">Kalimantan Barat</option>
                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                <option value="Kalimantan Timur">Kalimantan Timur</option>
                <option value="Kalimantan Utara">Kalimantan Utara</option>
                <option value="Gorontalo">Gorontalo</option>
                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                <option value="Sulawesi Utara">Sulawesi Utara</option>
                <option value="Sulawesi Barat">Sulawesi Barat</option>
                <option value="Maluku">Maluku</option>
                <option value="Maluku Utara">Maluku Utara</option>
                <option value="Papua">Papua</option>
                <option value="Papua Barat">Papua Barat</option>
                <option value="Papua Tengah">Papua Tengah</option>
                <option value="Papua Pegunungan">Papua Pegunungan</option>
                <option value="Papua Selatan">Papua Selatan</option> --}}
            </select>
        </div>

        <div class="dropdown col-lg-6 col-12 mb-3">
            <label for="{{ $prefix }}-district" class="form-label fw-semibold">District/City</label>
            <select name="address_disctrictID[{{ $prefix }}]" id="{{ $prefix }}-district" class="form-select text-muted" required>
                <option value="" disabled selected>Please select a Province</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-3">
            <label class="form-label" for="{{ $prefix }}-address">Full Address</label>
            <textarea id="{{ $prefix }}-address" name="address_fullname[{{ $prefix }}]" rows="5" class="form-control" required></textarea>
        </div>
    </div>
</div>

<div class="container mt-3">

    <div class="row">
        <div class="col-12 mb-3">
            <h5 class="fw-semibold fw-semibold"><i class="bi bi-mortarboard-fill"></i> Institution Details</h5>
            <small class="text-muted">Fill in the institution data completely and correctly.</small>
        </div>
    </div>

    <div class="row" x-data="{ binusianOpen: false }">
        <div class="col-12">
            <div class="row">
                <div class="mb-3 col-lg-6 col-12">
                    <label class="form-label fw-semibold" for="{{ $prefix }}-grade">Grade</label>
                    <select name="grade[{{ $prefix }}]" id="{{ $prefix }}-grade" class="form-select" required>
                        <option value="" selected disabled class="text-muted">Select your grade</option>
                        <option value="Grade 10">Grade 10</option>
                        <option value="Grade 11">Grade 11</option>
                        <option value="Grade 12">Grade 12</option>
                        <option value="1st Year">Year 1</option>
                        <option value="2nd Year">Year 2</option>
                        <option value="3rd Year">Year 3</option>
                        <option value="4th Year">Year 4</option>
                    </select>
                </div>
                <div class="mb-3 col-lg-6 col-12">
                    <label class="form-label fw-semibold">
                        Are you student of Binus University/School?
                    </label>
                    <div class="col-12">
                        <ul class="nav nav-tabs border-0 gap-3">
                            <button :class="(binusianOpen ? 'btn-primary' : 'btn-outline-gray')" @click.prevent="binusianOpen = true" style="padding: 6px 20px;border-radius: 8px;">
                                Yes
                            </button>
                            <button :class="(!binusianOpen ? 'btn-primary' : 'btn-outline-gray')" @click.prevent="binusianOpen = false" style="padding: 6px 20px;border-radius: 8px;">
                                No
                            </button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="tab-content">
                <div id="{{ $prefix }}-non-binusian" :class="'tab-pane fade show' + (binusianOpen ? '' : ' active')">
                    <div class="col-12 mb-3">
                        <label for="{{ $prefix }}-university" class="form-label fw-semibold">
                            Institution Name
                        </label>
                        <input id="{{ $prefix }}-university" name="university_name[{{ $prefix }}]" type="text" class="form-control" value="{{ auth()->user()->institution }}" required>
                        <small class="text-muted">Please edit your instution name if the institution name is
                            incorrect!</small>
                    </div>
                </div>
                <div id="{{ $prefix }}-binusian" :class="'tab-pane fade show' + (binusianOpen ? ' active' : '')">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="{{ $prefix }}-university" class="form-label fw-semibold">Institution
                                Name</label>
                            <input id="{{ $prefix }}-university" name="binusian_name[{{ $prefix }}]" type="text" class="form-control" placeholder="Bina Nusantara University" value="Bina Nusantara University" readonly required>
                        </div>
                    </div>

                    <hr class="mt-4">

                    <div class="row">
                        <div class="col-lg-6 col-12 mb-3">
                            <label for="{{ $prefix }}-nim" class="form-label fw-semibold">NIM</label>
                            <input id="{{ $prefix }}-nim" name="binusian_nim[{{ $prefix }}]" type="text" class="form-control" placeholder="Participant's NIM">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label class="form-label fw-semibold" for="{{ $prefix }}-region">
                                Campus Region
                            </label>
                            <select id="{{ $prefix }}-region" name="binusian_region[{{ $prefix }}]" class="form-select">
                                <option value="" selected value="">Select Institution Region</option>
                                <option value="Kemanggisan">
                                    Kemanggisan
                                </option>
                                <option value="Alam Sutera">
                                    Alam Sutera
                                </option>
                                <option value="Bekasi">
                                    Bekasi
                                </option>
                                <option value="Bandung">
                                    Bandung
                                </option>
                                <option value="Senayan">
                                    Senayan
                                </option>
                                <option value="Semarang">
                                    Semarang
                                </option>
                                <option value="Malang">
                                    Malang
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-3">
                            <label for="{{ $prefix }}-faculty" class="form-label fw-semibold">Faculty</label>
                            <input id="{{ $prefix }}-faculty" name="binusian_faculty[{{ $prefix }}]" placeholder="Participant's Faculty" type="text" class="form-control">
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label for="{{ $prefix }}-major" class="form-label fw-semibold">Major</label>
                            <input id="{{ $prefix }}-major" name="binusian_major[{{ $prefix }}]" placeholder="Participant's Major" type="text" class="form-control">
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>

<div class="container mt-3">
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="mb-3 col-12">
                <label class="form-label fw-semibold">Dietary Considerations or Allergies<small class="text-muted"> (Optional)</small></label>
                <input name="allergy[{{ $prefix }}]" type="text" class="form-control" placeholder="Vegetarian, No Spicy, ..." value="Nothing" required>
            </div>
        </div>
    </div>
</div>

<script>
    $('#{{ $prefix }}-province').change(function() {
        var $district = $('#{{ $prefix }}-district')
        $.ajax({
            url: "{{ route('districts.show') }}",
            data: {
                province_id: $(this).val()
            },
            success: function(data) {
                $district.html('<option value="" disabled selected>Select District/City</option>');
                $.each(data, function(id, value) {
                    $district.append('<option value="' + id + '">' + value + '</option>');
                });
            }
        });
    });

    document.addEventListener('alpine:initialized', (e) => {
        $('#{{ $prefix }}-email')[0].dispatchEvent(new Event('input'))
    })

</script>