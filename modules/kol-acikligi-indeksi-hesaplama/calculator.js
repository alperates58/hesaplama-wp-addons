function hcKolAcikligiIndeksiHesapla() {
    const height = parseFloat(document.getElementById('hc-ape-height').value);
    const span = parseFloat(document.getElementById('hc-ape-span').value);

    if (!height || !span) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const index = span / height;
    const diff = span - height;

    document.getElementById('hc-ape-val').innerText = index.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    let comment = "";
    if (index > 1.03) {
        comment = `Kollarınız boyunuza göre oldukça uzun (+${diff} cm). Bu durum tırmanış, boks ve basketbol gibi sporlarda avantaj sağlayabilir.`;
    } else if (index < 0.97) {
        comment = `Kollarınız boyunuza göre kısa (${diff} cm). Bu durum bench press gibi itiş hareketlerinde avantaj sağlayabilir.`;
    } else {
        comment = "Kollarınız ve boyunuz dengeli bir oranda.";
    }

    document.getElementById('hc-ape-comment').innerText = comment;
    document.getElementById('hc-ape-result').classList.add('visible');
}
