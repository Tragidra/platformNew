@extends('layouts.app')
@section('content')
    <template>
        <div id="app">
            <main>
                <header-main></header-main>
                <section class="pt-0">
                    <div class="container">
                        <div class="row">
                            <sidebar></sidebar>
                            <router-view></router-view>
                        </div>
                    </div>
                </section>
            </main>

        </div>
    </template>
@endsection
<script>

</script>
