function fetchData() {
    const dateInput = document.getElementById('date').value;
    
    if (!dateInput) {
        alert("Please select a date.");
        return;
    }

    fetch(`fetch_data.php?date=${dateInput}`)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('data-table').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = ''; // Clear existing data

            data.forEach(entry => {
                const row = tableBody.insertRow();
                row.insertCell(0).textContent = entry.id;
                row.insertCell(1).textContent = entry.comp_name;
                row.insertCell(2).textContent = entry.client_name;
                row.insertCell(3).textContent = entry.check_in_time;
                row.insertCell(4).textContent = entry.check_out_time;
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}
