function hcCeketBedeniHesapla() {
    const bust = parseFloat(document.getElementById('hc-jk-bust').value);
    
    if (!bust) return;

    // Erkek Ceket Bedeni Genellikle Göğüs / 2
    let size = Math.round(bust / 2);
    
    // Standart çift sayılara yuvarla (48, 50, 52...)
    if (size % 2 !== 0) size++;

    document.getElementById('hc-jk-val').innerText = size;
    document.getElementById('hc-jk-result').classList.add('visible');
}
