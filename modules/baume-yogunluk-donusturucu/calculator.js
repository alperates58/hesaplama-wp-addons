function hcBaumeToSg() {
    const baume = parseFloat(document.getElementById('hc-baume-val').value);
    const type = document.getElementById('hc-baume-type').value;
    if (isNaN(baume)) return;

    let sg = 1;
    if (type === 'heavy') {
        sg = 145 / (145 - baume);
    } else {
        sg = 140 / (baume + 130);
    }
    document.getElementById('hc-baume-sg').value = sg.toFixed(3);
}

function hcSgToBaume() {
    const sg = parseFloat(document.getElementById('hc-baume-sg').value);
    const type = document.getElementById('hc-baume-type').value;
    if (isNaN(sg) || sg === 0) return;

    let baume = 0;
    if (type === 'heavy') {
        baume = 145 - (145 / sg);
    } else {
        baume = (140 / sg) - 130;
    }
    document.getElementById('hc-baume-val').value = baume.toFixed(1);
}
