@extends('layouts.main-site')

@push('styles')
    <!-- Animation CSS -->
    <link rel="stylesheet" href="/assets/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/linearicons.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="/assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="/assets/owlcarousel/css/owl.theme.default.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/slick-theme.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <!-- DatePicker CSS -->
    <link href="/assets/css/datepicker.min.css" rel="stylesheet">
    <!-- TimePicker CSS -->
    <link href="/assets/css/mdtimepicker.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link id="layoutstyle" rel="stylesheet" href="/assets/color/theme-red.css">

    <style>
      /* Ensure page can scroll even if something left it locked */
      html, body { overflow-y: auto !important; height: auto !important; }
      .section { padding-top: 30px; padding-bottom: 40px; }

      /* Cards */
      .choice-grid{ display:grid; gap:12px; }
      .option-card{
          border:1px solid #e9ecef; border-radius:12px; padding:14px 16px; cursor:pointer;
          transition:transform .15s ease, box-shadow .15s ease, border-color .15s ease, background .15s ease;
          background:#fff; position:relative;
      }
      .option-card:hover{ transform:translateY(-1px); box-shadow:0 10px 24px rgba(0,0,0,.06) }
      .option-card.active{
          border-color:#ff3b53; background:linear-gradient(0deg, rgba(255,59,83,.07), rgba(255,59,83,.07)), #fff;
          box-shadow:0 10px 26px rgba(255,59,83,.12);
      }
      .option-title{ font-weight:800; margin:0; }
      .option-sub{ color:#6c757d; margin:2px 0 0 0; font-size:.925rem; }
      .checkmark{
          position:absolute; right:12px; top:12px; width:24px; height:24px; border-radius:50%;
          border:2px solid #dee2e6; display:flex; align-items:center; justify-content:center; font-size:14px; color:#fff;
          background:#fff;
      }
      .option-card.active .checkmark{ border-color:#ff3b53; background:#ff3b53; }

      .addr-card { border:1px solid #eef0f3; border-radius:12px; padding:12px 14px; background:#fff; }
      .addr-badge { font-size:.75rem; border:1px solid #eef0f3; border-radius:999px; padding:.15rem .5rem; background:#f8f9fb; }
      .muted { color:#6c757d; }
      .fieldset { border:1px dashed #e9ecef; border-radius:12px; padding:14px; background:#fff; }
      .fieldset legend { font-size:.95rem; font-weight:700; padding:0 6px; width:auto; }

      /* Make Places dropdown always visible above everything */
      .pac-container {
          z-index: 20000 !important;
      }
    </style>
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="/assets/js/jquery-1.12.4.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Your other vendor scripts (unchanged) -->
    <script src="/assets/owlcarousel/js/owl.carousel.min.js"></script>
    <script src="/assets/js/magnific-popup.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/parallax.js"></script>
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <script src="/assets/js/jquery.countTo.js"></script>
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/js/isotope.min.js"></script>
    <script src="/assets/js/jquery.dd.min.js"></script>
    <script src="/assets/js/slick.min.js"></script>
    <script src="/assets/js/datepicker.min.js"></script>
    <script src="/assets/js/mdtimepicker.min.js"></script>
    <script src="/assets/js/scripts.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#addressSelect').select2({
        placeholder: "Search & select address",
        allowClear: true,
        width: '100%'
    });
});
</script>

@endpush

@section('title', 'Create Account')

@section('header')
  <!-- START HEADER -->
  <header class="header_wrap fixed-top header_with_topbar light_skin main_menu_uppercase">
    <div class="container">
      @include('partials.nav')
    </div>
  </header>
  <!-- END HEADER -->
@endsection

@section('content')
<!-- START SECTION SHOP -->
<div class="section">
  <div class="container">
    <form method="POST" action="{{ route('customer.checkout.delivery.post') }}">
      @csrf
      <div class="row justify-content-center">
        <div class="col-12 col-lg-6 mx-auto">
          <div class="order_review">
            <h4 class="mb-4">Delivery Address</h4>
            <hr>
            @include('partials.message-bag')

            {{-- ===== Delivery mode selector (Saved vs New) ===== --}}
            @php $hasSaved = isset($addresses) && $addresses->count() > 0; @endphp
            <input type="hidden" name="mode" id="deliveryModeField" value="{{ old('mode', $hasSaved ? 'saved' : 'new') }}">

            {{-- ===== Saved addresses ===== --}}
            <div id="delivery_saved_block" class="mt-3 {{ $hasSaved ? '' : 'd-none' }}">
              @if($hasSaved)
                <div class="list-group mb-3">
                    <Label for="addressSelect">Select a Address For Delivary</Label>
                 <select name="saved_address_id" id="addressSelect" class="form-control">
                    <option value="">Select Address</option>

                    @foreach($addresses as $addr)
                        <option value="{{ $addr->id }}" class="p-2"
                            {{ old('saved_address_id') == $addr->id ? 'selected' : '' }}>

                            {{ $addr->building_name }},
                            {{ $addr->floor }},
                            Room {{ $addr->room_no }} -
                            {{ $addr->department }},
                            {{ $addr->campus }}

                        </option>
                    @endforeach
</select>
                </div>
              @else
                <div class="alert alert-info">You have no saved addresses yet.</div>
              @endif
            </div>

            {{-- Buttons --}}
            <div class="form-group col-md-12 mt-4 p-0">
              <button type="submit" class="btn btn-default btn-block">Continue</button>
            </div>
            <div class="form-group col-md-12 p-0">
              <a href="{{ route('customer.checkout.fulfilment') }}" class="btn btn-default btn-block">Back</a>
            </div>

          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- END SECTION SHOP -->

<!-- Delete Address Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-1">Are you sure you want to delete this address?</p>
        <small class="text-muted" id="addressToDelete"></small>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteBtn" class="btn btn-danger">
          <i class="fas fa-trash-alt me-1"></i> Delete
        </button>
      </div>
    </div>
  </div>
</div>

@endsection
