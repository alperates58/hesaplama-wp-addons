function hcEhliyetPuanHesapla() {
    var mevcut = parseInt(document.getElementById('hc-epk-mevcut').value) || 0;
    var checkboxes = document.getElementsByClassName('hc-epk-ihlal');
    
    var toplam = mevcut;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            toplam += parseInt(checkboxes[i].value);
        }
    }

    var durum = 'Risk Yok';
    var aciklama = 'Yasal sınır olan 100 ceza puanının altındasınız. 1 yıl içinde toplam ceza puanınız 100\'e ulaşmadığı sürece ehliyetinize el konulmaz.';
    var color = '#0f8a5f';

    if (toplam >= 100 && toplam < 200) {
        durum = 'Ehliyete 2 Ay El Konulur';
        aciklama = '<strong>DIKKAT:</strong> 1 yıl içinde ilk defa 100 ceza puanına ulaştığınız için sürücü belgenize <strong>2 ay süreyle</strong> el konulur ve eğitime tabi tutulursunuz.';
        color = '#c0362c';
    } else if (toplam >= 200 && toplam < 300) {
        durum = 'Ehliyete 4 Ay El Konulur';
        aciklama = '<strong>UYARI:</strong> 1 yıl içinde ikinci defa 100 ceza puanına ulaştığınız için sürücü belgenize <strong>4 ay süreyle</strong> el konulur ve psikoteknik değerlendirmeye tabi tutulursunuz.';
        color = '#c0362c';
    } else if (toplam >= 300) {
        durum = 'Ehliyetiniz Süresiz İptal Edilir';
        aciklama = '<strong>TEHLİKE:</strong> 1 yıl içinde üçüncü defa 100 ceza puanını aştığınız için sürücü belgeniz <strong>süresiz olarak iptal edilir</strong>.';
        color = '#c0362c';
    }

    document.getElementById('hc-epk-res-toplam').innerText = toplam + ' Puan';
    var durumTd = document.getElementById('hc-epk-res-durum');
    durumTd.innerText = durum;
    durumTd.style.color = color;
    document.getElementById('hc-epk-detay-aciklama').innerHTML = aciklama;

    document.getElementById('hc-epk-result').classList.add('visible');
}