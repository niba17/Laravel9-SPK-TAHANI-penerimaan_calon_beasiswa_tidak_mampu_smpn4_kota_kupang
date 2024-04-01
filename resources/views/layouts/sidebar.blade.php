 @php
     use Illuminate\Support\Facades\Auth;
 @endphp
 <!-- Page Aside-->
 <aside class="aside bg-white">

     <div class="simplebar-wrapper">
         <div data-pixr-simplebar>
             <div class="pb-6">
                 <!-- Mobile Logo-->
                 <div class="d-flex d-xl-none justify-content-between align-items-center border-bottom aside-header">
                     <a class="navbar-brand lh-1 border-0 m-0 d-flex align-items-center" href="./index.html">
                         <div class="d-flex align-items-center">
                             {{-- <svg class="f-w-5 me-2 text-primary d-flex align-self-center lh-1"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 203.58 182">
                                 <path
                                     d="M101.66,41.34C94.54,58.53,88.89,72.13,84,83.78A21.2,21.2,0,0,1,69.76,96.41,94.86,94.86,0,0,0,26.61,122.3L81.12,0h41.6l55.07,123.15c-12-12.59-26.38-21.88-44.25-26.81a21.22,21.22,0,0,1-14.35-12.69c-4.71-11.35-10.3-24.86-17.53-42.31Z"
                                     fill="currentColor" fill-rule="evenodd" fill-opacity="0.5" />
                                 <path
                                     d="M0,182H29.76a21.3,21.3,0,0,0,18.56-10.33,63.27,63.27,0,0,1,106.94,0A21.3,21.3,0,0,0,173.82,182h29.76c-22.66-50.84-49.5-80.34-101.79-80.34S22.66,131.16,0,182Z"
                                     fill="currentColor" fill-rule="evenodd" />
                             </svg> --}}
                             <span class="fw-black text-uppercase tracking-wide fs-6 lh-1">SPK | TAHANI</span>
                         </div>
                     </a>
                     <i
                         class="ri-close-circle-line ri-lg close-menu text-muted transition-all text-primary-hover me-4 cursor-pointer"></i>
                 </div>
                 <!-- / Mobile Logo-->

                 <ul class="list-unstyled mb-6">

                     <!-- Dashboard Menu Section-->
                     <li class="menu-section mt-2">Menu</li>
                     <li class="menu-item">
                         <a class="d-flex align-items-center @if (Request::route()->getName() == 'home') active @endif"
                             href="/home">
                             <span class="menu-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                     class="w-100">
                                     <rect fill-opacity=".5" fill="currentColor" x="3" y="3"
                                         width="7" height="7"></rect>
                                     <rect fill="currentColor" x="14" y="3" width="7"
                                         height="7"></rect>
                                     <rect fill-opacity=".5" fill="currentColor" x="14" y="14"
                                         width="7" height="7">
                                     </rect>
                                     <rect fill="currentColor" x="3" y="14" width="7"
                                         height="7"></rect>
                                 </svg>
                             </span>
                             <span class="menu-link">
                                 Home
                                 {{-- <span
                                     class="badge bg-success-faded text-success pb-1 ms-2 align-middle rounded-pill">beta</span> --}}
                             </span>
                         </a>
                         <a class="d-flex align-items-center @if (Request::route()->getName() == 'perhitungan-derajat_keanggotaan' ||
                                 Request::route()->getName() == 'perhitungan-query_penentuan') active @endif"
                             href="/perhitungan-derajat_keanggotaan">
                             <span class="menu-icon">
                                 <i class="fa-solid fa-square-root-variable"></i>
                             </span>
                             <span class="menu-link">
                                 Perhitungan
                                 {{-- <span
                                     class="badge bg-success-faded text-success pb-1 ms-2 align-middle rounded-pill">beta</span> --}}
                             </span>
                         </a>
                     </li>
                     <li class="menu-item"><a
                             class="d-flex align-items-center @if (Request::route()->getName() == 'akun' ||
                                     Request::route()->getName() == 'akun-add' ||
                                     Request::route()->getName() == 'akun-edit' ||
                                     Request::route()->getName() == 'siswa' ||
                                     Request::route()->getName() == 'siswa-add' ||
                                     Request::route()->getName() == 'siswa-edit' ||
                                     Request::route()->getName() == 'kriteria' ||
                                     Request::route()->getName() == 'kriteria-add' ||
                                     Request::route()->getName() == 'kriteria-edit' ||
                                     Request::route()->getName() == 'sub_kriteria' ||
                                     Request::route()->getName() == 'sub_kriteria-add' ||
                                     Request::route()->getName() == 'sub_kriteria-edit' ||
                                     Request::route()->getName() == 'kriteria_sub_kriteria' ||
                                     Request::route()->getName() == 'kriteria_sub_kriteria-add' ||
                                     Request::route()->getName() == 'kriteria_sub_kriteria-edit' ||
                                     Request::route()->getName() == 'tingkat' ||
                                     Request::route()->getName() == 'tingkat-add' ||
                                     Request::route()->getName() == 'tingkat-edit' ||
                                     Request::route()->getName() == 'kelas' ||
                                     Request::route()->getName() == 'kelas-add' ||
                                     Request::route()->getName() == 'kelas-edit' ||
                                     Request::route()->getName() == 'siswa_kriteria' ||
                                     Request::route()->getName() == 'siswa_kriteria-add' ||
                                     Request::route()->getName() == 'siswa_kriteria-edit') '' @else collapsed @endif"
                             href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenuItemPages"
                             aria-expanded="@if (Request::route()->getName() == 'akun' ||
                                     Request::route()->getName() == 'akun-add' ||
                                     Request::route()->getName() == 'akun-edit' ||
                                     Request::route()->getName() == 'siswa' ||
                                     Request::route()->getName() == 'siswa-add' ||
                                     Request::route()->getName() == 'siswa-edit' ||
                                     Request::route()->getName() == 'kriteria' ||
                                     Request::route()->getName() == 'kriteria-add' ||
                                     Request::route()->getName() == 'kriteria-edit' ||
                                     Request::route()->getName() == 'sub_kriteria' ||
                                     Request::route()->getName() == 'sub_kriteria-add' ||
                                     Request::route()->getName() == 'sub_kriteria-edit' ||
                                     Request::route()->getName() == 'kriteria_sub_kriteria' ||
                                     Request::route()->getName() == 'kriteria_sub_kriteria-add' ||
                                     Request::route()->getName() == 'kriteria_sub_kriteria-edit' ||
                                     Request::route()->getName() == 'tingkat' ||
                                     Request::route()->getName() == 'tingkat-add' ||
                                     Request::route()->getName() == 'tingkat-edit' ||
                                     Request::route()->getName() == 'kelas' ||
                                     Request::route()->getName() == 'kelas-add' ||
                                     Request::route()->getName() == 'kelas-edit' ||
                                     Request::route()->getName() == 'siswa_kriteria' ||
                                     Request::route()->getName() == 'siswa_kriteria-add' ||
                                     Request::route()->getName() == 'siswa_kriteria-edit') true @else false @endif"
                             aria-controls="collapseMenuItemPages">
                             <span class="menu-icon">
                                 <svg enable-background="new 0 0 520 520" viewBox="0 0 520 520"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <g>
                                         <path fill="currentColor"
                                             d="m481.734 100.063h-158.331l-43.111-70.397c-2.727-4.452-7.571-7.166-12.792-7.166h-119.235c-21.099 0-38.265 17.166-38.265 38.266v65.51 229.184c0 21.1 17.166 38.266 38.265 38.266h261.735 71.734c21.1 0 38.266-17.166 38.266-38.266v-217.13c0-21.101-17.166-38.267-38.266-38.267z" />
                                         <path fill="currentColor" opacity=".5"
                                             d="m80 355.459v-229.184h-41.734c-21.1 0-38.266 17.166-38.266 38.266v294.693c0 21.1 17.166 38.266 38.266 38.266h333.469c21.1 0 38.266-17.166 38.266-38.266v-35.51h-261.736c-37.641.001-68.265-30.623-68.265-68.265z" />
                                     </g>
                                 </svg>
                             </span>
                             <span class="menu-link">Data</span></a>
                         <div class="collapse @if (Request::route()->getName() == 'akun' ||
                                 Request::route()->getName() == 'akun-add' ||
                                 Request::route()->getName() == 'akun-edit' ||
                                 Request::route()->getName() == 'siswa' ||
                                 Request::route()->getName() == 'siswa-add' ||
                                 Request::route()->getName() == 'siswa-edit' ||
                                 Request::route()->getName() == 'kriteria' ||
                                 Request::route()->getName() == 'kriteria-add' ||
                                 Request::route()->getName() == 'kriteria-edit' ||
                                 Request::route()->getName() == 'sub_kriteria' ||
                                 Request::route()->getName() == 'sub_kriteria-add' ||
                                 Request::route()->getName() == 'sub_kriteria-edit' ||
                                 Request::route()->getName() == 'kriteria_sub_kriteria' ||
                                 Request::route()->getName() == 'kriteria_sub_kriteria-add' ||
                                 Request::route()->getName() == 'kriteria_sub_kriteria-edit' ||
                                 Request::route()->getName() == 'tingkat' ||
                                 Request::route()->getName() == 'tingkat-add' ||
                                 Request::route()->getName() == 'tingkat-edit' ||
                                 Request::route()->getName() == 'kelas' ||
                                 Request::route()->getName() == 'kelas-add' ||
                                 Request::route()->getName() == 'kelas-edit' ||
                                 Request::route()->getName() == 'siswa_kriteria' ||
                                 Request::route()->getName() == 'siswa_kriteria-add' ||
                                 Request::route()->getName() == 'siswa_kriteria-edit') show @endif" id="collapseMenuItemPages">
                             <ul class="submenu">
                                 <li>
                                     <a href="/akun" class="@if (Request::route()->getName() == 'akun' ||
                                             Request::route()->getName() == 'akun-add' ||
                                             Request::route()->getName() == 'akun-edit') active @endif">Akun
                                     </a>
                                 </li>
                                 <li>
                                     <a href="/siswa" class="@if (Request::route()->getName() == 'siswa' ||
                                             Request::route()->getName() == 'siswa-add' ||
                                             Request::route()->getName() == 'siswa-edit' ||
                                             Request::route()->getName() == 'siswa_kriteria' ||
                                             Request::route()->getName() == 'siswa_kriteria-add' ||
                                             Request::route()->getName() == 'siswa_kriteria-edit') active @endif">Siswa
                                     </a>
                                 </li>
                                 <li>
                                     <a href="/tingkat" class="@if (Request::route()->getName() == 'tingkat' ||
                                             Request::route()->getName() == 'tingkat-add' ||
                                             Request::route()->getName() == 'tingkat-edit' ||
                                             Request::route()->getName() == 'kelas' ||
                                             Request::route()->getName() == 'kelas-add' ||
                                             Request::route()->getName() == 'kelas-edit') active @endif">Tingkat
                                         & Kelas
                                     </a>
                                 </li>
                                 <li>
                                     <a href="/kriteria"
                                         class="@if (Request::route()->getName() == 'kriteria' ||
                                                 Request::route()->getName() == 'kriteria-add' ||
                                                 Request::route()->getName() == 'kriteria-edit' ||
                                                 Request::route()->getName() == 'sub_kriteria' ||
                                                 Request::route()->getName() == 'sub_kriteria-add' ||
                                                 Request::route()->getName() == 'sub_kriteria-edit' ||
                                                 Request::route()->getName() == 'kriteria_sub_kriteria' ||
                                                 Request::route()->getName() == 'kriteria_sub_kriteria-add' ||
                                                 Request::route()->getName() == 'kriteria_sub_kriteria-edit') active @endif">Kriteria & Sub Kriteria
                                     </a>
                                 </li>
                                 {{-- <li>
                                     <a href="/kecamatan"
                                         class="@if (Request::route()->getName() == 'kecamatan' || Request::route()->getName() == 'kecamatan-add' || Request::route()->getName() == 'kecamatan-edit' || Request::route()->getName() == 'kelurahan' || Request::route()->getName() == 'kelurahan-add' || Request::route()->getName() == 'kelurahan-edit') active @endif">Kecamatan & Kelurahan
                                     </a>
                                 </li> --}}
                             </ul>
                         </div>
                     </li>
                     <!-- / Dashboard Menu Section-->

                 </ul>
             </div>
         </div>
     </div>

 </aside> <!-- / Page Aside-->
