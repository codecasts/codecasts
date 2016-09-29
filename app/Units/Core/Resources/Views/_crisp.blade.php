<script type="text/javascript">CRISP_WEBSITE_ID = "3ad0a5c4-3f7c-42bd-b88b-d4e1ff912e7b";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.im/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
<script>
    @if(Auth::check())
            window.CRISP_READY_TRIGGER = function() {
        // Feed this call with your own internal email data.
        $crisp.user.email.set('{{ Auth::user()->email }}');
    };
    @endif
</script>
