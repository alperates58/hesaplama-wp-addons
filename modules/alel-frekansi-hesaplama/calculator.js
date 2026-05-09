function hcAlelFrekansiHesapla() {
    const aaCount = parseInt(document.getElementById('hc-alel-aa').value) || 0;
    const AaCount = parseInt(document.getElementById('hc-alel-Aa').value) || 0;
    const aaRecCount = parseInt(document.getElementById('hc-alel-aa-rec').value) || 0;

    const totalPop = aaCount + AaCount + aaRecCount;
    if (totalPop <= 0) {
        alert('Lütfen en az bir genotip sayısı giriniz.');
        return;
    }

    const totalAlleles = 2 * totalPop;
    const p = (2 * aaCount + AaCount) / totalAlleles;
    const q = (2 * aaRecCount + AaCount) / totalAlleles;

    document.getElementById('hc-alel-p').innerText = p.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });
    document.getElementById('hc-alel-q').innerText = q.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });
    
    document.getElementById('hc-alel-note').innerText = `Toplam Popülasyon: ${totalPop.toLocaleString('tr-TR')} birey (${totalAlleles.toLocaleString('tr-TR')} alel)`;
    document.getElementById('hc-alel-result').classList.add('visible');
}
