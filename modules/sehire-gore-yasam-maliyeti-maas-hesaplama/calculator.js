function hcSehirYasamHesapla() {
    var maas = parseFloat(document.getElementById('hc-sym-mevcut-maas').value) || 0;
    var mevcutEndeks = parseFloat(document.getElementById('hc-sym-mevcut-sehir').value) || 100;
    var hedefEndeks = parseFloat(document.getElementById('hc-sym-hedef-sehir').value) || 85;

    if (maas <= 0) {
        alert('Lütfen mevcut maaşınızı giriniz.');
        return;
    }

    // Hedef Maaş = Mevcut Maaş * (Hedef Endeks / Mevcut Endeks)
    var hedefMaas = maas * (hedefEndeks / mevcutEndeks);
    var farkOran = ((hedefEndeks - mevcutEndeks) / mevcutEndeks) * 100;

    document.getElementById('hc-sym-res-mevcut-endeks').innerText = mevcutEndeks;
    document.getElementById('hc-sym-res-hedef-endeks').innerText = hedefEndeks;
    
    var farkEl = document.getElementById('hc-sym-res-fark-oran');
    farkEl.innerText = (farkOran >= 0 ? '+' : '') + farkOran.toFixed(2) + '%';
    farkEl.style.color = farkOran >= 0 ? 'var(--hc-front-red)' : 'var(--hc-front-green)'; // Yaşam maliyeti düşmesi iyi olduğundan yeşil

    document.getElementById('hc-sym-res-hedef-maas').innerText = hedefMaas.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-sym-result').classList.add('visible');
}