function hcKiraTespitDavasiHesapla() {
    var mevcut = parseFloat(document.getElementById('hc-ktd-mevcut').value) || 0;
    var rayic = parseFloat(document.getElementById('hc-ktd-rayic').value) || 0;
    var sure = parseInt(document.getElementById('hc-ktd-sure').value) || 0;
    var indirim = parseFloat(document.getElementById('hc-ktd-indirim').value) || 15;

    var uyariDiv = document.getElementById('hc-ktd-uyari');
    uyariDiv.style.display = 'none';

    if (mevcut <= 0 || rayic <= 0) {
        alert('Lütfen mevcut kira bedeli ile emsal rayiç bedel alanlarını doldurunuz.');
        return;
    }

    if (sure < 5) {
        uyariDiv.innerText = 'Kira tespit davasının açılabilmesi için yasal olarak kiracılığın en az 5 yılı doldurmuş olması gerekmektedir (TBK m.344/3). 5 yıldan kısa süreli kiralar için endeksle artış sınırları geçerlidir.';
        uyariDiv.style.display = 'block';
    }

    var indirimTutari = rayic * (indirim / 100);
    var yeniKira = rayic - indirimTutari;
    
    // Yeni kira mevcut kiradan düşük olamaz
    if (yeniKira < mevcut) yeniKira = mevcut;

    var artisOrani = ((yeniKira - mevcut) / mevcut) * 100;

    document.getElementById('hc-ktd-res-rayic').innerText = rayic.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-ktd-res-indirim-tutari').innerText = '-' + Math.round(indirimTutari).toLocaleString('tr-TR') + ' ₺ (%' + indirim + ')';
    document.getElementById('hc-ktd-res-yeni').innerText = Math.round(yeniKira).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-ktd-res-oran').innerText = '%' + artisOrani.toFixed(2);

    document.getElementById('hc-ktd-result').classList.add('visible');
}