function hcTekTekrarMaksimumAgirlikHesapla() {
    const weight = parseFloat(document.getElementById('hc-1rm-weight').value);
    const reps = parseInt(document.getElementById('hc-1rm-reps').value);

    if (!weight || !reps) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (reps > 30) {
        alert('1RM hesabı genellikle 1-12 tekrar arasında en doğrudur. Lütfen daha düşük bir tekrar sayısı girin.');
        return;
    }

    // Brzycki Formülü: 1RM = Weight / (1.0278 - (0.0278 * Reps))
    const oneRM = weight / (1.0278 - (0.0278 * reps));

    document.getElementById('hc-1rm-val').innerText = oneRM.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kg';

    let levelsHtml = '<strong>Yüzdelik Dilimler:</strong><br>';
    const percentages = [95, 90, 85, 80, 75, 70, 65, 60, 50];
    
    percentages.forEach(p => {
        const val = oneRM * (p / 100);
        levelsHtml += `%${p}: ${val.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} kg<br>`;
    });

    document.getElementById('hc-1rm-levels').innerHTML = levelsHtml;
    document.getElementById('hc-1rm-result').classList.add('visible');
}
