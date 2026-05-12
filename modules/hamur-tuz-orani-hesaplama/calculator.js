function hcHamurTuzHesapla() {
    const flour = parseFloat(document.getElementById('hc-ds-flour').value);
    const ratio = parseFloat(document.getElementById('hc-ds-ratio').value);

    if (!flour || !ratio || flour <= 0 || ratio < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Baker's percentage: Salt = (Flour * Ratio) / 100
    const salt = (flour * ratio) / 100;

    const resultDiv = document.getElementById('hc-dough-salt-result');
    document.getElementById('hc-ds-val').innerText = salt.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    
    let note = "Profesyonel fırıncılıkta ideal tuz oranı %1.8 ile %2.2 arasındadır.";
    if (ratio > 2.5) note = "Uyarı: %2.5 üzerindeki tuz oranı hamurun kabarmasını yavaşlatabilir ve sağlığa zararlı olabilir.";
    
    document.getElementById('hc-ds-note').innerText = note;
    resultDiv.classList.add('visible');
}
