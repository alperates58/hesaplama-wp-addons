function hcAtikSuYukHesapla() {
    const flow = parseFloat(document.getElementById('hc-ww-flow').value);
    const bod = parseFloat(document.getElementById('hc-ww-bod').value) || 0;
    const cod = parseFloat(document.getElementById('hc-ww-cod').value) || 0;
    const ss = parseFloat(document.getElementById('hc-ww-ss').value) || 0;

    if (isNaN(flow) || flow <= 0) {
        alert('Lütfen geçerli bir debi değeri giriniz.');
        return;
    }

    const calculateLoad = (conc) => (flow * conc) / 1000;

    document.getElementById('hc-ww-bod-val').innerText = calculateLoad(bod).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ww-cod-val').innerText = calculateLoad(cod).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ww-ss-val').innerText = calculateLoad(ss).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-ww-result').classList.add('visible');
}
