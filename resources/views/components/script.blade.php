@push('scripts_start')

    <script type="text/javascript">
        var source_doc = '{{ $source }}';
    </script>
    <script src="{{ asset($source) }}"></script>
@endpush
