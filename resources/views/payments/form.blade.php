

<head>
  <!-- Other Tags -->

  <!-- Moyasar Styles -->
  <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.7.3/moyasar.css" />

  <!-- Moyasar Scripts -->

  
  <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
  <script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>

  <!-- Download CSS and JS files in case you want to test it locally, but use CDN in production -->
</head>
<section style="margin-top: 100px;">
  <h1 style="text-align: center; color: mediumblue;">Add Your Payment Information</h1>
  <div class="mysr-form"></div>

</section>
<script>
  Moyasar.init({
    element: '.mysr-form',
    amount: {{(int)($price*100)}},
    currency: 'SAR',
    description: 'reservation #',
    publishable_api_key: '{{config("services.moyasar.key_live")}}',
    callback_url: '{{ url(route("api.payments.callback",[$reservationId])) }}',
    methods: ['creditcard'],
  })
</script>





