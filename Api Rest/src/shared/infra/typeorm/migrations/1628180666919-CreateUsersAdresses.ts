import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class CreateUsersAdresses1628180666919 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "users_addresses",
        columns: [
          {
            name: "id",
            type: "varchar",
            isPrimary: true,
            generationStrategy: "uuid",
          },
          {
            name: "cep",
            type: "varchar(8)",
          },
          {
            name: "street",
            type: "varchar",
          },
          {
            name: "state",
            type: "varchar",
          },
          {
            name: "complement",
            type: "varchar",
          },
          {
            name: "house_number",
            type: "varchar",
          },
          {
            name: "city",
            type: "varchar",
          },
          {
            name: "created_at",
            type: "timestamp",
            default: "now()",
          },
          {
            name: "updated_at",
            type: "timestamp",
            default: "now()",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("users_addresses");
  }
}
