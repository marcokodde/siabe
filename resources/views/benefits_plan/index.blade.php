@extends('layouts.master')
@section('title', 'Beneficiarios')
@section('styles')
    {{-- Customs css --}}
@endsection
@section('content')
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h4 class="fs-20 font-w600  me-auto">Información de beneficiario</h4>
        <div>
            <a href="javascript:void(0);" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Job</a>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"> <i class="fas fa-envelope"></i></a>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"><i class="fas fa-phone-alt"></i></a>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm"><i class="fas fa-info"></i></a>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-xxl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 flex-wrap align-items-start">
                            <div class="col-md-12">
                                <div class="user d-sm-flex d-block pe-md-5 pe-0">
                                    <img src="/images/user.jpg" alt="">
                                    <div class="ms-sm-3 ms-0">
                                        <h5 class="mb-1 font-w600 fs-22"><a href="javascript:void(0);">{{ $child->fullname }}</a>
                                        </h5>
                                        {{-- <div class="listline-wrapper mb-2">
                                            <span class="item"><i class="far fa-envelope"></i>example@gmail.com</span>
                                            <span class="item"><i class="far fa-id-badge"></i>Manager</span>
                                            <span class="item"><i class="fas fa-map-marker-alt"></i>Indonesia</span>
                                        </div> --}}
                                        {{-- <p>A data analyst collects, interprets and visualizes data to uncover insights. A data analyst assigns a numerical value to business functions so performance.</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <h4 class="fs-20">Información</h4>
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Nombre Completo : </span> <span class="font-w400">{{ $child->fullname }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">CHILD ID : </span><span class="font-w400">{{ $child->child_id }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Subproyecto : </span><span class="font-w400">{{ $child->subproject->name }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Fecha de Nacimiento : </span><span class="font-w400">{{ $child->birthdate }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Edad : </span><span class="font-w400">{{ $child->age }} {{ $child->age == 1 ? 'año' : 'años' }}</span> </p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Genero : </span><span class="font-w400">{{ $child->child_gender->name }}</span></p>
                                    <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Tipo beneficiario : </span><span class="font-w400">{{ $child->child_type->name }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex flex-wrap justify-content-between">
                            <div class="mb-md-2 mb-3">
                                <span class="d-block mb-1"><i class="fas fa-circle me-2"></i>Currently Working at <strong>Abcd Pvt
                                        Ltd</strong></span>
                                <span><i class="fas fa-circle me-2"></i>3 Yrs Of Working Experience in <strong>Abcd Pvt
                                        Ltd</strong></span>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="btn btn-primary btn-md me-2  mb-2"><i
                                        class="fas fa-download me-2"></i>Download Ruseme</a>
                                <a href="javascript:void(0);" class="btn btn-warning btn-md me-2 mb-2"><i
                                        class="fas fa-share-alt me-2"></i>Share Profile</a>
                                <a href="javascript:void(0);" class="btn btn-info btn-md me-2 mb-2"><i
                                        class="fas fa-phone-alt me-2"></i>Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-xxl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="fs-20 d-block"><a href="javascript:void(0);">Planes de beneficios</a></h4>
                            {{-- <div class="d-block">
                                <span class="me-2"><a href="javascript:void(0);"><i class="fas fa-briefcase me-2"></i>Apcd
                                        company</a></span>
                                <span class="me-2"><a href="javascript:void(0);"><i
                                            class="fas fa-map-marker-alt me-2"></i>USA</a></span>
                                <span><a href="javascript:void(0);"><i class="fas fa-eye me-2"></i>View</a></span>
                            </div> --}}
                            <a href="{{ route('benefit.plan.add', $child->id) }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Nuevo plan</a>
                        </div>
                        <div class="card-body">

                            {{-- <h4 class="fs-20 mb-3">            
                            </h4> --}}
                            {{-- <div class="ms-4">
                                <p><i class="fas fa-dot-circle me-2"></i>We are Looking For a PHP Doveloper, who is must be
                                    familiar with the PHP fundamentals& PHP framwork. Experience with Laravel & mixs,
                                    Livewire </p>
                                <p><i class="fas fa-dot-circle me-2 "></i>Good knowledge of SQL and related databases, with
                                    a preference for those with MySQL experience.</p>
                                <p><i class="fas fa-dot-circle me-2 "></i>Excellent knowledge of the basic PHP 7 or web
                                    server exploits along with their solutions.</p>
                                <p><i class="fas fa-dot-circle me-2 "></i>Experience building or maintaining a CMS.</p>
                                <p><i class="fas fa-dot-circle me-2 "></i>Knowledge of MVC frameworks.</p>
                                <p><i class="fas fa-dot-circle me-2 "></i>A detailed understanding of database design and
                                    administration.</p>
                                <p><i class="fas fa-dot-circle me-2 "></i>The ability to integrate a variety of data sources
                                    and databases into a single system.</p>
                            </div> --}}
                            <hr>
                            <h4 class="fs-20 mb-3">Job Details</h4>
                            <div class="row mb-3">
                                <div class="col-xl-6">
                                    <div class="ms-4">
                                        <p class="font-w500 mb-3"><span class="custom-label">Job Role :</span><span
                                                class="font-w400"> PHP Developer</span></p>
                                        <p class="font-w500 mb-3"><span class="custom-label">Role:</span><span
                                                class="font-w400"> Front-End Doveloper</span></p>
                                        <p class="font-w500 mb-3"><span class="custom-label">Min Salary:</span><span
                                                class="font-w400"> $20,000</span></p>
                                        <p class="font-w500 mb-3"><span class="custom-label">Max Salary:</span><span
                                                class="font-w400"> $30,000</span></p>
                                        <p class="font-w500 mb-3"><span class="custom-label">Job Tags:</span><span
                                                class="font-w400"> PHP, Laravel, HTML5, SCSS,CSS, Javascript</span></p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="ms-4">
                                        <p class="font-w500 mb-3"><span class="custom-label">Job Experience:</span><span
                                                class="font-w400"> 2yrs+</span></p>
                                        <p class="font-w500 mb-3"><span class="custom-label">Launges:</span><span
                                                class="font-w400"> Hindi, English</span></p>
                                        <p class="font-w500 mb-3"><span class="custom-label">Locality:</span><span
                                                class="font-w400"> USA, UK, India</span></p>
                                        <p class="font-w500 mb-3"><span class="custom-label">Eligibility:</span><span
                                                class="font-w400"> B.tech ,Any Graduate</span></p>
                                        <p class="font-w500 mb-3"><span class="custom-label">Company :</span><span
                                                class="font-w400"> Abcd corporation pvt ltd</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-4 border-bottom border-top flex-wrap">
                                <span>Job ID: #8976542</span>
                                <span>Posted By <strong>Company</strong>/ 12-01-2021</span>
                            </div>
                        </div>
                        <div class="card-footer border-0">
                            <div>
                                <a href="javascript:void(0);" class="btn btn-primary btn-md me-2 mb-3"><i
                                        class="far fa-check-circle me-2"></i>Apply</a>
                                <a href="javascript:void(0);" class="btn btn-warning btn-md me-2 mb-3"><i
                                        class="fas fa-share-alt me-2"></i>Share Job</a>
                                <a href="javascript:void(0);" class="btn btn-secondary btn-md mb-3"><i
                                        class="fas fa-print me-2"></i>Print</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0 flex-wrap align-items-start">
                    <div class="col-md-12">
                        <div class="user d-sm-flex d-block pe-md-5 pe-0">
                            <img src="/images/user.jpg" alt="">
                            <div class="ms-sm-3 ms-0">
                                <h5 class="mb-1 font-w600 fs-22"><a href="javascript:void(0);">{{ $child->fullname }}</a>
                                </h5>
                                {{-- <div class="listline-wrapper mb-2">
                                    <span class="item"><i class="far fa-envelope"></i>example@gmail.com</span>
                                    <span class="item"><i class="far fa-id-badge"></i>Manager</span>
                                    <span class="item"><i class="fas fa-map-marker-alt"></i>Indonesia</span>
                                </div> --}}
                                {{-- <p>A data analyst collects, interprets and visualizes data to uncover insights. A data analyst assigns a numerical value to business functions so performance.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <h4 class="fs-20">Información</h4>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Nombre Completo : </span> <span class="font-w400">{{ $child->fullname }}</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">CHILD ID : </span><span class="font-w400">{{ $child->child_id }}</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Subproyecto : </span><span class="font-w400">{{ $child->subproject->name }}</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Fecha de Nacimiento : </span><span class="font-w400">{{ $child->birthdate }}</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Edad : </span><span class="font-w400">{{ $child->age }} {{ $child->age == 1 ? 'año' : 'años' }}</span> </p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Genero : </span><span class="font-w400">{{ $child->child_gender->name }}</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Tipo beneficiario : </span><span class="font-w400">{{ $child->child_type->name }}</span></p>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Launguages :</span> <span
                                    class="font-w400">English, German, Spanish</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Email :</span> <span
                                    class="font-w400">andrew@gmail.com</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Phone : </span><span
                                    class="font-w400">1234598765</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Industry :</span> <span
                                    class="font-w400">it Software/ Developer</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Date Of Birth : </span><span
                                    class="font-w400">13 June 1996</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Gender : </span><span
                                    class="font-w400">Female</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Marital Status : </span><span
                                    class="font-w400">Unmarried</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Permanent Address :</span> <span
                                    class="font-w400">USA</span></p>
                            <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Zip code: </span><span
                                    class="font-w400">12345</span></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between">
                    <div class="mb-md-2 mb-3">
                        <span class="d-block mb-1"><i class="fas fa-circle me-2"></i>Currently Working at <strong>Abcd Pvt
                                Ltd</strong></span>
                        <span><i class="fas fa-circle me-2"></i>3 Yrs Of Working Experience in <strong>Abcd Pvt
                                Ltd</strong></span>
                    </div>
                    <div>
                        <a href="javascript:void(0);" class="btn btn-primary btn-md me-2  mb-2"><i
                                class="fas fa-download me-2"></i>Download Ruseme</a>
                        <a href="javascript:void(0);" class="btn btn-warning btn-md me-2 mb-2"><i
                                class="fas fa-share-alt me-2"></i>Share Profile</a>
                        <a href="javascript:void(0);" class="btn btn-info btn-md me-2 mb-2"><i
                                class="fas fa-phone-alt me-2"></i>Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo rounded"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ $child->fullname }}</h4>
                                <p>UX / UI Designer</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">info@example.com</h4>
                                <p>Email</p>
                            </div>
                            <div class="dropdown ms-auto">
                                <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown"
                                    aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewbox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2">
                                            </circle>
                                        </g>
                                    </svg></a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View
                                        profile</li>
                                    <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to
                                        btn-close
                                        friends</li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group
                                    </li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-statistics">
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="m-b-0">150</h3><span>Follower</span>
                                        </div>
                                        <div class="col">
                                            <h3 class="m-b-0">140</h3><span>Place Stay</span>
                                        </div>
                                        <div class="col">
                                            <h3 class="m-b-0">45</h3><span>Reviews</span>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="javascript:void(0);" class="btn btn-primary mb-1 me-1">Follow</a>
                                        <a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal"
                                            data-bs-target="#sendMessageModal">Send Message</a>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="sendMessageModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Send Message</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="comment-form">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="text-black font-w600 form-label">Name <span
                                                                        class="required">*</span></label>
                                                                <input type="text" class="form-control" value="Author"
                                                                    name="Author" placeholder="Author">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="text-black font-w600 form-label">Email <span
                                                                        class="required">*</span></label>
                                                                <input type="text" class="form-control" value="Email"
                                                                    placeholder="Email" name="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="text-black font-w600 form-label">Comment</label>
                                                                <textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3 mb-0">
                                                                <input type="submit" value="Post Comment"
                                                                    class="submit btn btn-primary" name="submit">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-blog">
                                <h5 class="text-primary d-inline">Today Highlights</h5>
                                <img src="images/profile/1.jpg" alt="" class="img-fluid mt-4 mb-4 w-100">
                                <h4><a href="post-details.html" class="text-black">Darwin Creative Agency Theme</a></h4>
                                <p class="mb-0">A small river named Duden flows by their place and supplies it with the
                                    necessary regelialia. It is a paradisematic country, in which roasted parts of sentences
                                    fly into your mouth.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-interest">
                                <h5 class="text-primary d-inline">Interest</h5>
                                <div class="row mt-4 sp4" id="lightgallery">
                                    <a href="images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg"
                                        data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                        <img src="images/profile/2.jpg" alt="" class="img-fluid">
                                    </a>
                                    <a href="images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg"
                                        data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                        <img src="images/profile/3.jpg" alt="" class="img-fluid">
                                    </a>
                                    <a href="images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg"
                                        data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                        <img src="images/profile/4.jpg" alt="" class="img-fluid">
                                    </a>
                                    <a href="images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg"
                                        data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                        <img src="images/profile/3.jpg" alt="" class="img-fluid">
                                    </a>
                                    <a href="images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg"
                                        data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                        <img src="images/profile/4.jpg" alt="" class="img-fluid">
                                    </a>
                                    <a href="images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg"
                                        data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                        <img src="images/profile/2.jpg" alt="" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-news">
                                <h5 class="text-primary d-inline">Our Latest News</h5>
                                <div class="media pt-3 pb-3">
                                    <img src="images/profile/5.jpg" alt="image" class="me-3 rounded" width="75">
                                    <div class="media-body">
                                        <h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of
                                                textile samples</a></h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
                                    </div>
                                </div>
                                <div class="media pt-3 pb-3">
                                    <img src="images/profile/6.jpg" alt="image" class="me-3 rounded" width="75">
                                    <div class="media-body">
                                        <h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of
                                                textile samples</a></h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
                                    </div>
                                </div>
                                <div class="media pt-3 pb-3">
                                    <img src="images/profile/7.jpg" alt="image" class="me-3 rounded" width="75">
                                    <div class="media-body">
                                        <h5 class="m-b-5"><a href="post-details.html" class="text-black">Collection of
                                                textile samples</a></h5>
                                        <p class="mb-0">I shared this on my fb wall a few months back, and I thought.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                        class="nav-link active show">Posts</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">About
                                        Me</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                        class="nav-link">Setting</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <div class="post-input">
                                            <textarea name="textarea" id="textarea" cols="30" rows="5" class="form-control bg-transparent"
                                                placeholder="Please type what you want...."></textarea>
                                            <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3"
                                                data-bs-toggle="modal" data-bs-target="#linkModal"><i
                                                    class="fa fa-link m-0"></i> </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="linkModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Social Links</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a class="btn-social facebook" href="javascript:void(0)"><i
                                                                    class="fa fa-facebook"></i></a>
                                                            <a class="btn-social google-plus" href="javascript:void(0)"><i
                                                                    class="fa fa-google-plus"></i></a>
                                                            <a class="btn-social linkedin" href="javascript:void(0)"><i
                                                                    class="fa fa-linkedin"></i></a>
                                                            <a class="btn-social instagram" href="javascript:void(0)"><i
                                                                    class="fa fa-instagram"></i></a>
                                                            <a class="btn-social twitter" href="javascript:void(0)"><i
                                                                    class="fa fa-twitter"></i></a>
                                                            <a class="btn-social youtube" href="javascript:void(0)"><i
                                                                    class="fa fa-youtube"></i></a>
                                                            <a class="btn-social whatsapp" href="javascript:void(0)"><i
                                                                    class="fa fa-whatsapp"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-primary light me-1 px-3"
                                                data-bs-toggle="modal" data-bs-target="#cameraModal"><i
                                                    class="fa fa-camera m-0"></i> </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="cameraModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Upload images</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">Upload</span>
                                                                <div class="form-file">
                                                                    <input type="file"
                                                                        class="form-file-input form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#postModal">Post</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="postModal">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Post</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <textarea name="textarea" id="textarea2" cols="30" rows="5" class="form-control bg-transparent"
                                                                placeholder="Please type what you want...."></textarea>
                                                            <a class="btn btn-primary btn-rounded"
                                                                href="javascript:void(0)">Post</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                            <img src="images/profile/8.jpg" alt=""
                                                class="img-fluid w-100 rounded">
                                            <a class="post-title" href="post-details.html">
                                                <h3 class="text-black">Collection of textile samples lay spread</h3>
                                            </a>
                                            <p>A wonderful serenity has take possession of my entire soul like these sweet
                                                morning of spare which enjoy whole heart.A wonderful serenity has take
                                                possession of my entire soul like these sweet morning
                                                of spare which enjoy whole heart.</p>
                                            <button class="btn btn-primary me-2"><span class="me-2"><i
                                                        class="fa fa-heart"></i></span>Like</button>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#replyModal"><span class="me-2"><i
                                                        class="fa fa-reply"></i></span>Reply</button>
                                        </div>
                                        <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                            <img src="images/profile/9.jpg" alt=""
                                                class="img-fluid w-100 rounded">
                                            <a class="post-title" href="post-details.html">
                                                <h3 class="text-black">Collection of textile samples lay spread</h3>
                                            </a>
                                            <p>A wonderful serenity has take possession of my entire soul like these sweet
                                                morning of spare which enjoy whole heart.A wonderful serenity has take
                                                possession of my entire soul like these sweet morning
                                                of spare which enjoy whole heart.</p>
                                            <button class="btn btn-primary me-2"><span class="me-2"><i
                                                        class="fa fa-heart"></i></span>Like</button>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#replyModal"><span class="me-2"><i
                                                        class="fa fa-reply"></i></span>Reply</button>
                                        </div>
                                        <div class="profile-uoloaded-post pb-3">
                                            <img src="images/profile/8.jpg" alt=""
                                                class="img-fluid w-100 rounded">
                                            <a class="post-title" href="post-details.html">
                                                <h3 class="text-black">Collection of textile samples lay spread</h3>
                                            </a>
                                            <p>A wonderful serenity has take possession of my entire soul like these sweet
                                                morning of spare which enjoy whole heart.A wonderful serenity has take
                                                possession of my entire soul like these sweet morning
                                                of spare which enjoy whole heart.</p>
                                            <button class="btn btn-primary me-2"><span class="me-2"><i
                                                        class="fa fa-heart"></i></span>Like</button>
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                                data-bs-target="#replyModal"><span class="me-2"><i
                                                        class="fa fa-reply"></i></span>Reply</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="about-me" class="tab-pane fade">
                                    <div class="profile-about-me">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">About Me</h4>
                                            <p class="mb-2">A wonderful serenity has taken possession of my entire soul,
                                                like these sweet mornings of spring which I enjoy with my whole heart. I am
                                                alone, and feel the charm of existence was created for the bliss of souls
                                                like mine.I am so happy, my dear friend, so absorbed in the exquisite sense
                                                of mere tranquil existence, that I neglect my talents.</p>
                                            <p>A collection of textile samples lay spread out on the table - Samsa was a
                                                travelling salesman - and above it there hung a picture that he had recently
                                                cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                        </div>
                                    </div>
                                    <div class="profile-skills mb-5">
                                        <h4 class="text-primary mb-2">Skills</h4>
                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-primary light btn-xs mb-1">Responsive</a>
                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                                    </div>
                                    <div class="profile-lang  mb-5">
                                        <h4 class="text-primary mb-2">Language</h4>
                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
                                                class="flag-icon flag-icon-us"></i> English</a>
                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
                                                class="flag-icon flag-icon-fr"></i> French</a>
                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i
                                                class="flag-icon flag-icon-bd"></i> Bangla</a>
                                    </div>
                                    <div class="profile-personal-info">
                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Availability <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>27</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                    Florida</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Year Experience <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <form>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" placeholder="Email" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" placeholder="Password"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" placeholder="1234 Main St"
                                                        class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Address 2</label>
                                                    <input type="text" placeholder="Apartment, studio, or floor"
                                                        class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label class="form-label">State</label>
                                                        <select class="form-control default-select wide" id="inputState">
                                                            <option selected="">Choose...</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-2">
                                                        <label class="form-label">Zip</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check custom-checkbox">
                                                        <input type="checkbox" class="form-check-input" id="gridCheck">
                                                        <label class="form-check-label form-label" for="gridCheck"> Check
                                                            me out</label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Sign
                                                    in</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light"
                                            data-bs-dismiss="modal">btn-close</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- Customs js --}}
    <input type="hidden" id="urlList" value="{{ route('children.list') }}">
    <input type="hidden" id="urlGet" value="{{ route('children.get') }}">
    <input type="hidden" id="urlAdd" value="{{ route('children.add') }}">
    <input type="hidden" id="urlSave" value="{{ route('children.save') }}">
    <input type="hidden" id="urlDelete" value="{{ route('children.delete') }}">
    <script src="{{ url('js/viewlogic/children/index.js') }}"></script>
@endsection
