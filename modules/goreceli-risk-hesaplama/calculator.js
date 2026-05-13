function hcRelativeRiskHesapla() {
    const a = parseFloat(document.getElementById('hc-rr-a').value);
    const b = parseFloat(document.getElementById('hc-rr-b').value);
    const c = parseFloat(document.getElementById('hc-rr-c').value);
    const d = parseFloat(document.getElementById('hc-rr-d').value);

    if (isNaN(a) || isNaN(b) || isNaN(c) || isNaN(d)) {
        alert('Lütfen tüm değerleri doldurun.');
        return;
    }

    const riskExposed = a / (a + b);
    const riskUnexposed = c / (c + d);

    if (riskUnexposed === 0) {
        alert('Maruz kalmayan gruptaki risk 0 olduğu için RR hesaplanamaz.');
        return;
    }

    const rr = riskExposed / riskUnexposed;

    document.getElementById('hc-res-rr-val').innerText = rr.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    
    let desc = "";
    if (rr > 1) {
        desc = `Maruz kalan grupta risk, maruz kalmayan gruba göre %${((rr - 1) * 100).toLocaleString('tr-TR', {maximumFractionDigits: 1})} daha fazladır.`;
    } else if (rr < 1) {
        desc = `Maruz kalan grupta risk, maruz kalmayan gruba göre %${((1 - rr) * 100).toLocaleString('tr-TR', {maximumFractionDigits: 1})} daha azdır (Koruyucu etki).`;
    } else {
        desc = "İki grup arasında risk farkı yoktur (RR = 1).";
    }

    document.getElementById('hc-rr-desc').innerText = desc;
    document.getElementById('hc-goreceli-risk-hesaplama-result').classList.add('visible');
}
