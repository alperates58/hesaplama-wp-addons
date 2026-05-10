function hcBenchPressPiramitSetHesapla() {
    const oneRM = parseFloat(document.getElementById('hc-pyramid-1rm').value);

    if (!oneRM) {
        alert('Lütfen 1RM değerinizi girin.');
        return;
    }

    const sets = [
        { set: 1, reps: 12, intensity: 60 },
        { set: 2, reps: 10, intensity: 70 },
        { set: 3, reps: 8, intensity: 80 },
        { set: 4, reps: 6, intensity: 90 },
        { set: 5, reps: 4, intensity: 95 }
    ];

    let html = '';
    sets.forEach(s => {
        const weight = oneRM * (s.intensity / 100);
        html += `
            <tr>
                <td>${s.set}</td>
                <td>${s.reps}</td>
                <td><strong>${weight.toLocaleString('tr-TR', { maximumFractionDigits: 1 })} kg</strong></td>
                <td>%${s.intensity}</td>
            </tr>
        `;
    });

    document.getElementById('hc-pyramid-table').innerHTML = html;
    document.getElementById('hc-pyramid-result').classList.add('visible');
}
