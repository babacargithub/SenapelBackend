{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('parution') }}"><i class="nav-icon la la-calendar"></i> Parutions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('appel') }}"><i class="nav-icon la la-book"></i> Appels</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('avis') }}"><i class="nav-icon la la-trophy"></i> Avis</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('achat-parution') }}"><i class="nav-icon la la-shopping-cart"></i> Achat parutions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('categorie-appel') }}"><i class="nav-icon la la-tag"></i> Categorie appels</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('client') }}"><i class="nav-icon la la-user"></i> Clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('compte-client') }}"><i class="nav-icon la la-wallet"></i> Compte clients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ route('rapports') }}"><i class="nav-icon la la-chart-bar"></i> Rapports</a></li>

