function hcIbdHesapla() {
    const curVal = parseFloat(document.getElementById('hc-ibd-current-val').value);
    const curQty = parseFloat(document.getElementById('hc-ibd-current-qty').value);
    const baseVal = parseFloat(document.getElementById('hc-ibd-base-val').value);
    const baseQty = parseFloat(document.getElementById('hc-ibd-base-qty').value);

    if (!curVal || !curQty || !baseVal || !baseQty) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Unit Price Current = curVal / curQty
    // Unit Price Base = baseVal / baseQty
    // Index = (UPC / UPB) * 100
    const index = ((curVal / curQty) / (baseVal / baseQty)) * 100;

    document.getElementById('hc-ibd-value').innerText = index.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    let comment = "";
    if (index > 100) comment = `İhracat birim fiyatları temel döneme göre %${(index - 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 })} artmıştır.`;
    else if (index < 100) comment = `İhracat birim fiyatları temel döneme göre %${(100 - index).toLocaleString('tr-TR', { maximumFractionDigits: 2 })} azalmıştır.`;
    else comment = "İhracat birim fiyatları değişmemiştir.";

    document.getElementById('hc-ibd-comment').innerText = comment;
    document.getElementById('hc-ibd-result').classList.add('visible');
}
