document.getElementById('hc-dyn-katsayi').addEventListener('change', function() {
    document.getElementById('hc-dyn-custom-grup').style.display = (this.value === 'custom') ? 'block' : 'none';
});
function hcDogrusYanlisNetHesapla() {
    var dogru = parseInt(document.getElementById('hc-dyn-dogru').value);
    var yanlis = parseInt(document.getElementById('hc-dyn-yanlis').value);
    var katsayiSec = document.getElementById('hc-dyn-katsayi').value;
    var sonuc = document.getElementById('hc-dogru-yanlis-net-hesaplama-result');
    if (isNaN(dogru)||isNaN(yanlis)) { alert('Doğru ve yanlış sayısını girin.'); return; }
    var katsayi;
    if (katsayiSec === 'custom') {
        katsayi = parseFloat(document.getElementById('hc-dyn-custom').value);
        if (isNaN(katsayi)) { alert('Özel katsayıyı girin.'); return; }
    } else { katsayi = parseFloat(katsayiSec); }
    var net = dogru - yanlis * katsayi;
    var bos = 0;
    sonuc.innerHTML =
        '<p><strong>Doğru:</strong> ' + dogru + ' &nbsp;|&nbsp; <strong>Yanlış:</strong> ' + yanlis + '</p>' +
        '<p><strong>Çıkarma Katsayısı:</strong> ' + katsayi.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Net = ' + dogru + ' − ' + yanlis + ' × ' + katsayi + '</strong></p>' +
        '<p class="hc-result-value">Net: ' + net.toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>';
    sonuc.classList.add('visible');
}
