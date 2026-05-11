function hcAtikBertarafHesapla() {
    const birimFiyat = parseFloat(document.getElementById('hc-at-tip').value);
    const miktar = parseFloat(document.getElementById('hc-at-miktar').value);
    const mesafe = parseFloat(document.getElementById('hc-at-mesafe').value) || 0;

    if (!miktar) {
        alert('Lütfen atık miktarını giriniz.');
        return;
    }

    const bertarafMaliyeti = birimFiyat * miktar;
    
    // Nakliye: Ortalama 25 TL / km / ton (2026 tahmini)
    const nakliyeBirim = 25;
    const nakliyeMaliyeti = mesafe * miktar * nakliyeBirim;

    const toplam = bertarafMaliyeti + nakliyeMaliyeti;

    const sonucDiv = document.getElementById('hc-waste-result');
    document.getElementById('hc-at-res-total').innerText = toplam.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-at-res-bertaraf').innerText = bertarafMaliyeti.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-at-res-nakliye').innerText = nakliyeMaliyeti.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    const noteDiv = document.getElementById('hc-at-res-note');
    noteDiv.innerText = `Fiyatlar 2026 yılı tahmini ortalama piyasa verileridir. Resmi tarifeler ve tesis bazlı ücretler değişiklik gösterebilir.`;

    sonucDiv.classList.add('visible');
}
