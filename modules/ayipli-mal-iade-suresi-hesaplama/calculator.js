function hcAyipliMalHesapla() {
    var tur = document.getElementById('hc-ami-tur').value;
    var teslimStr = document.getElementById('hc-ami-teslim').value;
    var tespitStr = document.getElementById('hc-ami-tespit').value;

    if (!teslimStr || !tespitStr) {
        alert('Lütfen teslim ve tespit tarihlerini seçiniz.');
        return;
    }

    var teslim = new Date(teslimStr);
    var tespit = new Date(tespitStr);

    if (tespit < teslim) {
        alert('Ayıbın tespit edildiği tarih teslim tarihinden önce olamaz.');
        return;
    }

    // Yasal Sorumluluk Süreleri (TKHK m.12)
    var limitYears = 2;
    if (tur === 'standart') limitYears = 2;
    if (tur === 'ikinci_el') limitYears = 1;
    if (tur === 'ikinci_el_tasit') limitYears = 2;
    if (tur === 'tasinmaz') limitYears = 5;

    var sonTarih = new Date(teslim);
    sonTarih.setFullYear(teslim.getFullYear() + limitYears);

    var diffTime = sonTarih - tespit;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    var durumBox = document.getElementById('hc-ami-durum-box');
    var ispatTd = document.getElementById('hc-ami-res-ispat');

    if (diffDays < 0) {
        durumBox.innerText = 'YASAL SÜRE AŞILDI (Zamanaşımı Geçti)';
        durumBox.style.background = '#fef2f2';
        durumBox.style.border = '1px solid #fca5a5';
        durumBox.style.color = '#991b1b';
    } else {
        durumBox.innerText = 'YASAL SÜRE İÇİNDE (Ayıplı Mal Bildirimi Yapabilirsiniz)';
        durumBox.style.background = '#f0fdf4';
        durumBox.style.border = '1px solid #bbf7d0';
        durumBox.style.color = '#166534';
    }

    // İlk 6 Ay İspat Kuralı: TKHK m.10 uyarınca, teslimden itibaren 6 ay içinde ortaya çıkan ayıpların teslim anında var olduğu kabul edilir. İspat yükü satıcıdadır.
    var altiAySonra = new Date(teslim);
    altiAySonra.setMonth(teslim.getMonth() + 6);
    
    if (tespit <= altiAySonra) {
        ispatTd.innerText = 'Tüketici Lehine (Ayıbın teslim anında var olduğu karine kabul edilir - İspat yükü satıcıdadır)';
        ispatTd.style.color = '#0f8a5f';
    } else {
        ispatTd.innerText = 'Standart İspat Yükü (Kusursuz olduğunuzu kanıtlamanız gerekebilir)';
        ispatTd.style.color = '#c98905';
    }

    document.getElementById('hc-ami-res-limit').innerText = limitYears + ' Yıl';
    document.getElementById('hc-ami-res-kalan').innerText = diffDays < 0 ? 'Zamanaşımı dolmuş' : diffDays + ' Gün Kaldı';

    document.getElementById('hc-ami-result').classList.add('visible');
}