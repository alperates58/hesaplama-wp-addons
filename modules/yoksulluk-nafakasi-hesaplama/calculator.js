function hcYoksullukNafakasiHesapla() {
    var ynOdeyen = parseFloat(document.getElementById('hc-yn-odeyen-gelir').value) || 0;
    var ynAlan = parseFloat(document.getElementById('hc-yn-alan-gelir').value) || 0;
    var kusur = document.getElementById('hc-yn-kusur').value;
    
    var errorDiv = document.getElementById('hc-yn-error-msg');
    var successDiv = document.getElementById('hc-yn-success-data');
    
    errorDiv.style.display = 'none';
    successDiv.style.display = 'none';

    if (ynOdeyen <= 0) {
        alert('Lütfen nafaka ödeyecek eşin aylık net gelirini giriniz.');
        return;
    }

    if (kusur === 'agir') {
        errorDiv.innerText = 'Yargıtay ve TMK m.175 uyarınca boşanmada kusuru daha ağır olan eş lehine yoksulluk nafakasına hükmedilemez.';
        errorDiv.style.display = 'block';
        document.getElementById('hc-yn-result').classList.add('visible');
        return;
    }
    
    if (kusur === 'esit') {
        errorDiv.innerText = 'UYARI: Yargıtay son içtihatlarında eşit kusurlu eş lehine de yoksulluk nafakası takdir edilebileceğini belirtse de, mahkemeler genellikle eşit kusur halinde talebi reddedebilmektedir. Hakimin takdirine göre düşük miktarda veya reddedilebilir.';
        errorDiv.style.display = 'block';
    }

    if (ynAlan >= ynOdeyen) {
        errorDiv.innerText = 'Nafaka alacak kişinin geliri ödeyecek kişiden fazla veya eşit olduğu durumlarda yoksulluk nafakası verilmez.';
        errorDiv.style.display = 'block';
        document.getElementById('hc-yn-result').classList.add('visible');
        return;
    }

    var fark = ynOdeyen - ynAlan;
    var nafakaMin = 0;
    var nafakaMax = 0;

    if (ynAlan === 0) {
        nafakaMin = ynOdeyen * 0.18;
        nafakaMax = ynOdeyen * 0.26;
    } else {
        nafakaMin = fark * 0.15;
        nafakaMax = fark * 0.22;
    }

    // Limitler
    var cap = ynOdeyen * 0.33;
    if (nafakaMin > cap) nafakaMin = cap * 0.9;
    if (nafakaMax > cap) nafakaMax = cap;

    document.getElementById('hc-yn-val').innerText = 
        Math.round(nafakaMin).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(nafakaMax).toLocaleString('tr-TR') + ' ₺';
    successDiv.style.display = 'block';
    document.getElementById('hc-yn-result').classList.add('visible');
}