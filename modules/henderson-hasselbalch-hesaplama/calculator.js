function hcHendersonHesapla() {
    const pka = parseFloat(document.getElementById('hc-hh-pka').value);
    const salt = parseFloat(document.getElementById('hc-hh-salt').value);
    const acid = parseFloat(document.getElementById('hc-hh-acid').value);

    if (isNaN(pka) || isNaN(salt) || isNaN(acid)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (acid === 0) {
        alert('Asit derişimi 0 olamaz.');
        return;
    }

    // pH = pKa + log10(salt / acid)
    const ph = pka + Math.log10(salt / acid);

    document.getElementById('hc-hh-val').innerText = ph.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-hh-result').classList.add('visible');
}
