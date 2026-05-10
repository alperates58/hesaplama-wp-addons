function hcEaAddInput() {
    const container = document.getElementById('hc-ea-inputs');
    const count = container.getElementsByClassName('hc-form-group').length + 1;
    const div = document.createElement('div');
    div.className = 'hc-form-group';
    div.innerHTML = `<label>${count}. Sınav:</label><input type="number" class="hc-ea-score" placeholder="80">`;
    container.appendChild(div);
}

function hcExamAvgHesapla() {
    const inputs = document.getElementsByClassName('hc-ea-score');
    let scores = [];
    for (let input of inputs) {
        let val = parseFloat(input.value);
        if (!isNaN(val)) scores.push(val);
    }

    if (scores.length === 0) {
        alert('Lütfen en az bir sınav puanı giriniz.');
        return;
    }

    const avg = scores.reduce((a, b) => a + b, 0) / scores.length;

    document.getElementById('hc-ea-res-val').innerText = avg.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-sinav-puan-result').classList.add('visible');
}
