import { v4 as uuid } from "uuid";

import IUsers_AddressesRepository from "@modules/users/repositories/IUsers_AddressesRepository";
import ICreateAddressDTO from "@modules/users/dtos/ICreateAddressDTO";

import User_Address from "../../infra/typeorm/entities/User_Address";

class FakeUsersAddressesRepository implements IUsers_AddressesRepository {
  private addresses: User_Address[] = [];

  public async create({
    cep,
    house_number,
  }: ICreateAddressDTO): Promise<User_Address> {
    const address = new User_Address();
    const addressData = {
      cep,
      house_number,
      city: "São Paulo",
      state: "SP",
      district: "Sé",
      street: "Rua Barão do Rio Branco",
      complement: "lado impar",
    };

    Object.assign(address, { id: uuid() }, addressData);

    this.addresses.push(address);

    return address;
  }
}

export default FakeUsersAddressesRepository;
