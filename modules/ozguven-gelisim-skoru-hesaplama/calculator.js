function hcOzguvenHesapla() {
    var qs = document.querySelectorAll('.hc-self-q');
    var toplam = 0;

    for (var i = 0; i < qs.length; i++) {
        var el = qs[i];
        var val = parseInt(el.value) || 0;
        var type = el.getAttribute('data-type');
        
        if (type === 'reverse') {
            toplam += (3 - val);
        } else {
            toplam += val;
        }
    }

    var durum = '';
    var tavsiye = '';
    var renk = '#22c55e';

    if (toplam >= 12) {
        durum = 'Yüksek Benlik Saygısı / Güçlü Özgüven';
        tavsiye = 'Kendinizle son derece barışıksınız. Güçlü yönlerinizin farkındasınız; bu durum sosyal ilişkilerinizde ve kariyerinizde liderlik vasıflarınızı destekler.';
        renk = 'var(--hc-front-green)';
    } else if (toplam >= 7) {
        durum = 'Sağlıklı / Ortalama Özgüven Seviyesi';
        tavsiye = 'Kendi değerinizin farkındasınız ancak zaman zaman kendinizi sabote etme veya kıyaslama eğilimleriniz olabilir. Kıyaslamalardan kaçının.';
        renk = '#3b82f6';
    } else {
        durum = 'Düşük Benlik Saygısı Belirtileri';
        tavsiye = 'Kendinize karşı aşırı acımasız ve eleştirel olabilirsiniz. Küçük başarılarınızı dahi takdir edin ve gerekirse bilişsel terapi destekli kişisel gelişim kitaplarına odaklanın.';
        renk = '#ef4444';
    }

    document.getElementById('hc-self-res-skor').innerText = toplam + ' / 15';
    document.getElementById('hc-self-res-skor').style.color = renk;
    document.getElementById('hc-self-res-durum').innerText = durum;
    document.getElementById('hc-self-res-durum').style.color = renk;
    document.getElementById('hc-self-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-self-result').classList.add('visible');
}