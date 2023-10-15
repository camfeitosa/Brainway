const columns = document.querySelectorAll('.column');

columns.forEach(column => {
  new Sortable(column, {
    group: 'kanban',
    animation: 150,
    onEnd: event => {
      console.log('Card moved:', event.item.textContent);
    }
  });
});
