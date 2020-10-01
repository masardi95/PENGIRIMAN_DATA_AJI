<script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-database.js"></script>

<script>
// Your web app's Firebase configuration
var sisaWaktu=0;
var firebaseConfig = {
  apiKey: "AIzaSyDY3rHL5RXmA8E6hYwsD-MD1ndC4AzZQTU",
  authDomain: "psikotesiffah.firebaseapp.com",
  databaseURL: "https://psikotesiffah.firebaseio.com",
  projectId: "psikotesiffah",
  storageBucket: "psikotesiffah.appspot.com",
  messagingSenderId: "113516459597",
  appId: "1:113516459597:web:dfc23383de4449ba27ce04",
  measurementId: "G-62F6P67JR0"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();
firebase.database();


function setTimeFirebase(username, namaKateg, idSubKategori, idHeader, waktu) {
  firebase.database().ref(username+'/'+namaKateg+'_'+idSubKategori+'_'+idHeader).set({
    waktu: waktu
  }, function(error) {
    if (error) {
      // console.log('Error');
    } else {
      // console.log('Gass');
    }
  });
}

function getTimeFirebase(username, namaKateg, idSubKategori, idHeader, time) {
  var idHeaderHasil = idHeader;
  firebase.database().ref(username+'/'+namaKateg+'_'+idSubKategori+'_'+idHeader+'/waktu').once('value').then(function(snapshot) {
    var sisaWaktu = snapshot.val();
    if (sisaWaktu==null) {sisaWaktu=0;}

    var waktu = time*60;
    waktu = waktu - sisaWaktu; 
    loading(false);  

    console.log(waktu);
    setInterval(function(){ 
      if(navigator.onLine){
        setTimeFirebase(username, namaKateg, idSubKategori, idHeader, sisaWaktu++); 
      }
      if(waktu>=0 ){
        $('#timer').html(rubahDetik(waktu--, idHeaderHasil))
      }else{
        $.ajax({
          url: url+'siswa/kumpulkanTest/'+idHeader+'/0',
          type: 'GET',
          dataType: 'JSON',
        })
        .done(function() {
          loading(false);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          window.location.href =url+"siswa";
        });
      }
    }, 1000);
  });

}

function rubahDetik(x, idHeader){
  $('#siswaWaktuTimer').val(x);
  y     = x % 3600;
  jam   = x / 3600;
  menit = y / 60;
  detik = y % 60;
  if (x < 0) {
    loading(true);
    $.ajax({
      url: url+'siswa/kumpulkanTest/'+idHeader+'/0',
      type: 'GET',
      dataType: 'JSON',
    })
    .done(function() {
      loading(false);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      var n =3;
      setInterval(function(){ 
        console.log("timer");
        error('Waktu Kamu sudah Habis!, '+n--)
        if(n<0)
          window.location.href =url+"siswa";
      }, 1000);
    });
    return;
    
  }
  return Math.floor(jam) +':'+ Math.floor(menit) +':'+  Math.floor(detik);
}

</script>