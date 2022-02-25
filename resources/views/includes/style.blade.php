
<!-- Custom fonts for this template-->
<link href="{{ url('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  
  <style>
.card-svg{
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1414' height='456' preserveAspectRatio='none' viewBox='0 0 1414 456'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1110%26quot%3b)' fill='none'%3e%3cpath d='M45.763%2c121.09C71.573%2c121.504%2c94.388%2c103.528%2c105.278%2c80.124C114.789%2c59.683%2c104.904%2c37.651%2c93.688%2c18.094C82.392%2c-1.604%2c68.389%2c-21.741%2c45.763%2c-23.655C20.131%2c-25.823%2c-6.174%2c-13.92%2c-18.611%2c8.597C-30.726%2c30.531%2c-22.978%2c56.518%2c-10.533%2c78.266C2.018%2c100.199%2c20.496%2c120.685%2c45.763%2c121.09' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M49.676%2c109.964C72.119%2c109.456%2c94.51%2c101.479%2c106.059%2c82.229C117.916%2c62.466%2c115.733%2c38.129%2c105.011%2c17.728C93.386%2c-4.392%2c74.658%2c-25.639%2c49.676%2c-25.055C25.312%2c-24.486%2c10.466%2c-1.099%2c-1.355%2c20.213C-12.694%2c40.655%2c-22.859%2c64.563%2c-11.305%2c84.884C0.339%2c105.362%2c26.125%2c110.497%2c49.676%2c109.964' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M-36.63 -24.18 a12.45 12.45 0 1 0 24.9 0 a12.45 12.45 0 1 0 -24.9 0z' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1348.282%2c72.236C1364.676%2c72.548%2c1378.546%2c61.877%2c1387.241%2c47.975C1396.598%2c33.014%2c1402.231%2c14.692%2c1394.054%2c-0.945C1385.373%2c-17.547%2c1366.958%2c-28.016%2c1348.282%2c-26.533C1331.476%2c-25.198%2c1321.109%2c-9.637%2c1313.58%2c5.447C1307.017%2c18.595%2c1305.035%2c33.499%2c1311.81%2c46.539C1319.159%2c60.684%2c1332.345%2c71.933%2c1348.282%2c72.236' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1256.58 5.42 a71.64 71.64 0 1 0 143.28 0 a71.64 71.64 0 1 0 -143.28 0z' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1420.867%2c194.973C1456.148%2c193.74%2c1489.879%2c178.671%2c1508.006%2c148.377C1526.62%2c117.27%2c1525.449%2c79.452%2c1509.458%2c46.919C1491.081%2c9.532%2c1462.493%2c-27.241%2c1420.867%2c-28.9C1377.14%2c-30.642%2c1339.795%2c0.754%2c1319.142%2c39.336C1299.655%2c75.738%2c1299.907%2c120.299%2c1322.497%2c154.861C1343.262%2c186.631%2c1382.936%2c196.299%2c1420.867%2c194.973' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M-81.36 385.35 a101.91 101.91 0 1 0 203.82 0 a101.91 101.91 0 1 0 -203.82 0z' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M-51.45 355.46 a42.11 42.11 0 1 0 84.22 0 a42.11 42.11 0 1 0 -84.22 0z' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M-47.62 351.62 a34.44 34.44 0 1 0 68.88 0 a34.44 34.44 0 1 0 -68.88 0z' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1431.787%2c608.763C1476.244%2c608.889%2c1507.836%2c568.891%2c1527.185%2c528.866C1543.892%2c494.305%2c1540.253%2c455.46%2c1522.299%2c421.531C1502.874%2c384.823%2c1473.258%2c350.808%2c1431.787%2c348.585C1386.994%2c346.184%2c1343.619%2c371.128%2c1322.75%2c410.835C1303.072%2c448.277%2c1316.911%2c491.28%2c1337.321%2c528.328C1358.709%2c567.153%2c1387.461%2c608.637%2c1431.787%2c608.763' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1344.08%2c429.927C1359.525%2c430.559%2c1372.993%2c420.618%2c1381.028%2c407.412C1389.435%2c393.596%2c1393.376%2c376.294%2c1385.208%2c362.335C1377.103%2c348.484%2c1360.099%2c343.311%2c1344.08%2c344.27C1329.713%2c345.13%2c1317.434%2c354.087%2c1310.679%2c366.796C1304.338%2c378.727%2c1305.701%2c392.647%2c1312.02%2c404.59C1318.847%2c417.494%2c1329.493%2c429.331%2c1344.08%2c429.927' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1230.08 396.72 a124.64 124.64 0 1 0 249.28 0 a124.64 124.64 0 1 0 -249.28 0z' fill='rgba(78%2c 115%2c 223%2c 1)' class='triangle-float2'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1110'%3e%3crect width='1414' height='456' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");
}
.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background-color: #4e73df;
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
  </style>
