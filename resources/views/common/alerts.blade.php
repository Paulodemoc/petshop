<?php $status_success = Session::get('status_success'); ?>

@if ($status_success != '')
    <!-- Form Error List -->
    <div class="alert alert-success">
        <strong>{{$status_success}}</strong>
    </div>
@endif
