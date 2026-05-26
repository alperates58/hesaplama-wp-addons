function hcTursuTuzHesapla() {
    var su = parseFloat(document.getElementById('hc-tto-su').value) || 0;
    var oran = parseFloat(document.getElementById('hc-tto-oran').value) || 5;
    var sirkeOrani = parseFloat(document.getElementById('hc-tto-sirke').value) || 20;

    if (su <= 0) {
        alert('Lütfen geçerli salamura suyu hacmi giriniz.');
        return;
    }

    // Tuz hesabı: su hacmi * tuz oranı
    var tuzGram = su * (oran / 100);

    // Sirke hesabı
    var sirkeMl = su * (sirkeOrani / 100);

    // Eklenecek net su: Toplam salamura hacmi içinden sirke çıkarılır
    var netSu = su - sirkeMl;

    // Pratik kaşık ölçüleri: 1 yemek kaşığı kaya tuzu ~ 15 gram.
    var kasikTuz = tuzGram / 15;
    
    // 1 çay bardağı ~ 100 ml
    var bardakSirke = sirkeMl / 100;

    var ekstra = 'Kıvam korumak için kavanoz başına 3-4 adet limon tuzu ve 1 tatlı kaşığı toz şeker eklemeniz fermantasyonu destekler.';

    document.getElementById('hc-tto-res-tuz').innerText = tuzGram.toFixed(0) + ' gram (Yaklaşık ' + kasikTuz.toFixed(1) + ' yemek kaşığı kaya tuzu)';
    document.getElementById('hc-tto-res-sirke').innerText = sirkeMl.toFixed(0) + ' ml (Yaklaşık ' + bardakSirke.toFixed(1) + ' çay bardağı sirke)';
    document.getElementById('hc-tto-res-su').innerText = netSu.toFixed(0) + ' ml';
    document.getElementById('hc-tto-res-ekstra').innerText = ekstra;

    document.getElementById('hc-tto-result').classList.add('visible');
}