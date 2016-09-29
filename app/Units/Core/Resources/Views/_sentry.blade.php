<script>
    Raven.config('{{ config('sentry.public_dsn') }}', { logger: '{{ app('env') }}'}).install();
    @if(Auth::check())
    Raven.setUserContext({email:'{{ Auth::user()->email }}', id: '{{ Auth::user()->id }}'});
    @endif
</script>
