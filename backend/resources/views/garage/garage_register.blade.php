<form method="post" action="{{route('garage_ragister')}}">
  <input type="text" name="name"/>
  <input type="hidden" name="city_id" value="1"/>
  <input type="email" name="email"/>
  <input type="text" name="desc"/>
  <input type="number" name="phone"/>
  <input type="text" name="address"/>
  <input type="text" name="postal"/>
  <input type="file" name="garage_pic"/>
  <input type="submit" value="Submit"/>
</form>
